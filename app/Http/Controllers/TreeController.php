<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Carbon\Carbon;
use GeoIP;

class TreeController extends Controller
{
    public $module;

    public $moduleConfig;

    public $treeType;

    protected $level = 7;

    protected $activePlan;
    
    function index(Request $request, $userId = null)
    {
        $type = 'sponsor';

        $data = [];
        $userId = !$userId ? Auth::user()->id : $userId;
        $option['level'] = 2;
        $option['type'] = $data['type'] = $type;
        $option['parent'] = $userId;
        $data['content'] = $this->renderTree($option);

        return view('admin.tree', $data);
    }

    /**
     * @param User $user
     * @return string
     */
    function getProfilePic(User $user = null, $userId = null)
    {
        $user = $user ?: User::find($userId);
        $gender = $user->profile ? $user->profile->gender : 'M';
        $placeholder = $gender == 'M' ? 'images/maleUser.jpg' : 'images/femaleUser.jpg';

        return asset(($user->profile && $user->profile->profile_pic) ? $user->profile->profile_pic : $placeholder);
    }

    /**
     * RenderTree view
     *
     */
    function renderTree($options)
    {
        $data = $dispatch = [];
        $dispatch['type'] = $data['type'] = $this->treeType = $options['type'];
        $dispatch['parentId'] = $options['parent'];
        $data['downLines'] = $downLines = $this->getData(collect($dispatch));

        if (isset($options['markupOnly']) && $options['markupOnly']) return $downLines;

        return view('admin.view', $data);
    }

    /**
     * Get Data from tree module
     *
     */
    function getData(Collection $options)
    {
        /** @var User $parent */
        $parent = User::withDepth('level')->with('profile')->find($options->get('parentId'));
        $this->level += $parent->level;
        $nodes = $parent->descendantsQuery($treeType = $options->get('type'), true)
            ->withDepth('level')
            ->having('level', '<=', $this->level)
            ->get()
            ->toTree();
        $output = '';

        foreach ($nodes as $key => $node)
            $output .= $this->setHtml($node);

        return $output;
    }

    /**
     * Set html for node
     *
     * @param User $node
     * @param null $customHtml
     * @param bool $append
     * @return string
     */
    function setHtml(User $node, $customHtml = null, $append = false)
    {
        //set tree avatar
        $treeAvatar = $this->getProfilePic($node);

        $parentClass = !$node->children->count() ? 'noChildren' : '';
        if ($node->children->count() || (!$node->children->count()))
            $parentClass .= ' hv-item-parent ';
        $html = '<ul data-level="' . $node->level . '">     
                    <li>
                        <a href="javascript:void(0);">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img data-id="' . $node->id . '" src="' . $treeAvatar . '" alt="Member">
                                    <div class="member-details">
                                        <h3 class="username-style">' . $node->username . '</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    ';
        if ($node->children->count()) {
            if ($node->level < $this->level)
                $html .= $this->setChildNode($node);
        } else
            $html .= '';
        $html .= '</li></ul>';

        return $html;
    }

    /**
     * Set html for node
     *
     * @param User $node
     * @param null $customHtml
     * @param bool $append
     * @return string
     */
    function setHtml2(User $node, $customHtml = null, $append = false)
    {
        //set tree avatar
        $treeAvatar = $this->getProfilePic($node);

        $parentClass = !$node->children->count() ? 'noChildren' : '';
        if ($node->children->count() || (!$node->children->count()))
            $parentClass .= ' hv-item-parent ';
        $html = '<a href="javascript:void(0);">
                    <div class="member-view-box">
                        <div class="member-image">
                            <img data-id="' . $node->id . '" src="' . $treeAvatar . '" alt="Member">
                            <div class="member-details">
                                <h3 class="username-style">' . $node->username . '</h3>
                            </div>
                        </div>
                    </div>
                </a>';
        if ($node->children->count()) {
            if ($node->level < $this->level)
                $html .= $this->setChildNode($node);
        } else
            $html .= '';
        $html .= '';

        return $html;
    }

    /**
     * @param User $node
     * @return string
     */
    function setChildNode(User $node)
    {
        $width = 'unlimited';
        $html = '<ul class="active">';
        
        foreach ($node->children as $child) {
            $html .= '<li>';
            $html .= $this->setHtml2($child);
            $html .= '</li>';
        }

        // $html .= ($width == 'unlimited' || count($node->children) < $width) ? $this->setEmptyNode($node) : '';
        // $html .= '';

        $html .= '</ul>';

        return $html;
    }

    /**
     * @param int $parent
     * @param Request $request
     * @return \App\Blueprint\Interfaces\Module\view|view|string
     * @throws Throwable
     */
    function reload($parent = null, Request $request)
    {
        $defaults = [
            'parent' => $parent ?: Auth::user()->id,
            'type' => 'placement',
        ];
        $data = array_merge($defaults, $request->all());

        /* prevent showing other users tree except downline */
        if ($data['parent']) {
            $uplineUsers = User::getDescendantsOf(Auth::user()->id, $data['type'])->pluck('user_id');
            if (!$uplineUsers->contains($data['parent'])) $data['parent'] = Auth::user()->id;
        }

        return $this->renderTree2($data);
    }

    /**
     * @param null $id
     * @return string
     * @throws Throwable
     */
    function tooltip($id = null)
    {
        $data = [
            'user' => User::with(['profile'])->find($id),
            'moduleId' => $this->module->moduleId,
        ];

        $data['sponsor'] = User::find($data['user']->sponsor_id)->first();
        return view('admin.tooltip', $data);
    }

    /**
     * RenderTree view
     *
     * @param array $options array of tree data
     * @return \App\Blueprint\Interfaces\Module\view|string
     * @throws Throwable
     */
    function renderTree2($options)
    {
        $data = $dispatch = [];
        $dispatch['type'] = $data['type'] = $this->treeType = $options['type'];
        $dispatch['parentId'] = $options['parent'];
        $data['downLines'] = $downLines = $this->getData2(collect($dispatch));

        if (isset($options['markupOnly']) && $options['markupOnly']) return $downLines;

        return view('admin.view', $data);
    }

    /**
     * Get Data from tree module
     *
     * @param Collection $options tree rendering options
     * @return string
     */
    function getData2(Collection $options)
    {
        /** @var UserRepo $parent */
        $parent = User::withDepth('level')->with('profile')->find($options->get('parentId'));
        $this->level += $parent->level;
        $nodes = $parent->descendantsQuery($treeType = $options->get('type'), true)
            ->withDepth('level')
            ->having('level', '<=', $this->level)
            ->get()
            ->toTree();
        $output = '';

        foreach ($nodes as $key => $node)
            $output .= $this->setHtml1($node);

        return $output;
    }

    /**
     * Set html for node
     *
     * @param User $node
     * @param null $customHtml
     * @param bool $append
     * @return string
     */
    function setHtml1(User $node, $customHtml = null, $append = false)
    {
        //set tree avatar
        $treeAvatar = $this->getProfilePic($node);

        $parentClass = !$node->children->count() ? 'noChildren' : '';
        if ($node->children->count() || (!$node->children->count()))
            $parentClass .= ' hv-item-parent ';
        $html = '<ul data-level="' . $node->level . '">     
                    <li>
                        <a href="javascript:void(0);">
                            <div class="member-view-box">
                                <div class="member-image">
                                    <img data-id="' . $node->id . '" src="' . $treeAvatar . '" alt="Member">
                                    <div class="member-details">
                                        <h3 class="username-style">' . $node->username . '</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    ';
        if ($node->children->count()) {
            if ($node->level < $this->level)
                $html .= $this->setChildNode2($node, 'mainChild');
        } else
            $html .= '';
        $html .= '</li></ul>';

        return $html;
    }

    /**
     * Set html for node
     *
     * @param User $node
     * @param null $customHtml
     * @param bool $append
     * @return string
     */
    function setHtml22(User $node, $customHtml = null, $append = false)
    {
        //set tree avatar
        $treeAvatar = $this->getProfilePic($node);

        $parentClass = !$node->children->count() ? 'noChildren' : '';
        if ($node->children->count() || (!$node->children->count()))
            $parentClass .= ' hv-item-parent ';
        $html = '<a href="javascript:void(0);">
                    <div class="member-view-box">
                        <div class="member-image">
                            <img data-id="' . $node->id . '" src="' . $treeAvatar . '" alt="Member">
                            <div class="member-details">
                                <h3 class="username-style">' . $node->username . '</h3>
                            </div>
                        </div>
                    </div>
                </a>';
        if ($node->children->count()) {
            if ($node->level < $this->level)
                $html .= $this->setChildNode2($node);
        } else
            $html .= '';
        $html .= '';

        return $html;
    }

    /**
     * @param User $node
     * @param null $mainChild
     * @return string
     */
    function setChildNode2(User $node, $mainChild = null)
    {
        $width = 'unlimited';
        $html = isset($mainChild) ? '<ul class="active">' : '<ul>';
        $html .= ($width == 'unlimited' || count($node->children) < $width) ? $this->setEmptyNode($node) : '';
            $html .= '';
        foreach ($node->children as $child) {
            $html .= '<li>';
            $html .= $this->setHtml22($child);
            $html .= '</li>';
        }

        $html .= ($width == 'unlimited' || count($node->children) < $width) ? $this->setEmptyNode($node) : '';
        $html .= '';
        $html .= '</ul>';

        return $html;
    }

    /**
     * @param User $node
     * @return string
     */
    function setNodeRegisterButton(User $node)
    {
        return '<a href="javascript:;"><button data-placement="' . $node->id . '" class="btn btn-outline registerNode">
                    <i class="fa fa-plus"></i>
                </button></a>';
    }

    /**
     * @param User $node
     * @return string
     */
    function setEmptyNode(User $node)
    {
        // if ($this->moduleConfig->get('tree_registration'))
        //     $emptyNode = '<li>
        //             <div class="hv-item">' . $this->setNodeRegisterButton($node) . '</div>                        
        //          </li>';
        // else
            $emptyNode = '<li>
                            <div class="hv-item">
                                <button data-placement="' . $node->id . '" class="btn btn-outline"><i class="fa fa-plus"></i></button>
                            </div>
                          </li>';

        return $emptyNode;
    }
}
