<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Services\MenuService;
use App\Models\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    
    protected $menuService;
    public function __construct(MenuService $menuService) {
        $this->menuService = $menuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $menu = $this->menuService->getMenus($request->all());
        return view('menu.index',['menus' =>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Menus $menu)
    {
        
        $this->menuService->postMenus($request->all(), $menu);
        return redirect('menu')->with('success_message', 'add menu sucess');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menus $menu)
    {
        
        $menus = $this->menuService->getFormEdit($menu->id);
        return view('menu.edit',['menu'=>$menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Menus $menu)
    {
       
        $this->menuService->updateMenu($request->all(),$menu);
        return redirect('menu')->with('success_message', 'update menu sucess');
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menus $menu)
    {
       
       $this->menuService->deleteMenu($menu);
       return redirect('menu')->with('success_message', 'delete menu sucess');
    }
}
