<?php
if(!function_exists("vietproHelper")){
    function vietproHelper(){
        return "Vietpro Helper !";
    }
}
if(!function_exists("showCategories"))
{
    function showCategories($categories, $parent, $char, $parent_id_child)
    {
        foreach ($categories as $item)
        {
            if($item["parent"] == $parent){
                if($item['id'] == $parent_id_child){
                    echo "<option selected value=".$item["id"].">".$char.$item["name"]."</option>";

                }
                else{
                    echo "<option value=".$item["id"].">".$char.$item["name"]."</option>";

                }
                $newparent = $item["id"];
                echo showCategories($categories , $newparent, $char."|--", $parent_id_child);
            }
        }
    }
}

if(!function_exists("ShowInfoCategories"))
{
    function ShowInfoCategories($categories, $parent, $char)
    {
        foreach ($categories as $item)
        {
            if($item["parent"] == $parent){
                echo '
                <div class="item-menu"><span>'.$char.$item["name"].'</span>
                    <div class="category-fix">
                        <a class="btn-category btn-primary" href="/admin/category/edit/'.$item["id"].'"><i
                                class="fa fa-edit"></i></a>
                        <a class="btn-category btn-danger" href="/admin/category/delete/'.$item["id"].'"><i
                                class="fas fa-times"></i></i></a>

                    </div>
                </div>
                ';
                $newparent = $item["id"];
                echo ShowInfoCategories($categories , $newparent, $char."|--");
            }
        }
    }
}
if(!function_exists("ShowInfoCategoriesEdit"))
{
    function ShowInfoCategoriesEdit($categories, $parent, $char)
    {
        foreach ($categories as $item)
        {
            if($item["parent"] == $parent){
                echo '
                <div class="item-menu"><span >'.$char.$item["name"].'</span>
                    <div class="category-fix">
                        <a class="btn-category btn-primary" href="/admin/category/edit/'.$item["id"].'"><i
                                class="fa fa-edit"></i></a>
                        <a class="btn-category btn-danger" href="/admin/category/delete/'.$item["id"].'"><i
                                class="fas fa-times"></i></i></a>
                                
                    </div>
                </div>
                ';
                $newparent = $item["id"];
                echo ShowInfoCategoriesEdit($categories , $newparent, $char."|--");
            }
        }
    }
}

