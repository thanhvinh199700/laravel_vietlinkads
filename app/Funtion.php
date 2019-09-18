<?php

//

//function cateParent($data, $parent = 0, $lvl = 1) {
//
//    foreach ($data as $k => $value) {
//        $id = $value->id;
//        $name = $value->category_name;
//        if ($value->parent == $parent) {
//
//            echo "<tr data-level='{$lvl}'>";
//            echo "<td>{$id}</td>";
//            echo "<td>{$name}</td>";
//            echo "</tr>";
//            unset($data[$k]);
//            $levelChild = $lvl + 1;
//            cateParent($data, $id, $levelChild);
//        }
//    }
//}
//function categoryParent($data, $parent = 0) {
//
//    foreach ($data as $k => $value) {
//        $id = $value->id;
//        $name = $value->category_name;
//        if ($value->parent == $parent) {
//            echo "<tr data-tt-id='{$id}' data-tt-parent-id='{$value->parent}'>";
//            echo "<td>{$name}</td>";
//            echo "</tr>";
//            unset($data[$k]);
//            categoryParent($data, $id);
//        }
//    }
//}
//function menu($data, $parent = 0, $root = false) {
//    if($root == true)
//               echo "</div>";
//    foreach ($data as $key => $value) {
//        $id = $value->id;
//        $name = $value->category_name;        
//        if($value->parent == 0) 
//        {
//           echo '<div class="dropdown" style="margin-left: 50%;">';
//           echo '<a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="'. 'category-' . $value->id .'" href="/page.html">
//                '.$value->category_name.' <span class="caret"></span>
//            </a>';    
//           unset($data[$key]);
//           menu($data, $id, true);
//        } elseif ($value->parent != 0 && $value->parent == $parent) {
//            echo "<ul class='dropdown-menu multi-level' role='menu' aria-labelledby='dropdownMenu'>";
//            
//            echo "<li class='dropdown-submenu'>";
//            echo "<a tabindex='-1' href='#'>{$name}</a>";
//            unset($data[$key]);
//            menu($data, $id, false);      
//            echo "</li>";
//            echo "</ul>";
//        }
//        
//    }
//}