<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('remove_directory'))
{
function remove_directory($directory, $empty=FALSE)
{
	
	
    if(substr($directory,-1) == '/') {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return FALSE;
    } elseif(!is_readable($directory)) {

    return FALSE;

    } else {

        $handle = opendir($directory);
        while (FALSE !== ($item = readdir($handle)))
        {
            if($item != '.' && $item != '..') {
                $path = $directory.'/'.$item;
                if(is_dir($path)) {
                    remove_directory($path);
                }else{
                    unlink($path);
                }
            }
        }
        closedir($handle);
        if($empty == FALSE)
        {
            if(!rmdir($directory))
            {
                return FALSE;
            }
        }
    return TRUE;
    }
}
}


	function auth()
	{
		$CIH = & get_instance();
		$admin_id = $CIH->session->userdata('u_id');
		if($admin_id=='')
		{
			header("Location: ".base_url()."admin/login"); exit;
		}
	}
	function get_header_contact($data='')
	{
		
		$return = '';
		$CI =& get_instance();
		$query=$CI->db->query("SELECT * FROM tbl_contact WHERE id = 1");
		return $query->row();
	}
	function get_tabs($selected='')
	{
		global $str;
		$return = '';
		$CI =& get_instance();
		$query=$CI->db->query("SELECT * FROM pages_tabs WHERE tab_parent_id=0 ORDER BY tab_name ASC");
		foreach($query->result() as $tabs)
		{
			$p_id=$tabs->tab_id;
			get_childs ($p_id,"",$selected);
		}
		return $str;
	}
	
	function get_title($id='')
	{
		$CI =& get_instance();
		$query=$CI->db->query("SELECT title FROM menu  WHERE id=".$id."");
		return $query->row()->title;
	}
	function get_customer_title($id='')
	{
		$CI =& get_instance();
		$query=$CI->db->query("SELECT title FROM location  WHERE id=".$id."");
		return $query->row()->title;
	}
	function get_emp_name($id='')
	{
		$CI =& get_instance();
		$query=$CI->db->query("SELECT emp_name FROM tbl_employee  WHERE id=".$id."");
		return $query->row()->emp_name;
	}
	function get_image_alt_text_ar($id='')
	{
		$CI =& get_instance();
		$query=$CI->db->query("SELECT alt_text_ar tbl_gallery_images  menu  WHERE id=".$id."");
		return $query->row()->alt_text_ar;
	}
	function get_program_title($id='')
	{
		$CI =& get_instance();
		$query=$CI->db->query("SELECT title FROM shop  WHERE id=".$id."");
		return $query->row()->title;
	}
	function get_program_title_ar($id='')
	{
		$CI =& get_instance();
		$query=$CI->db->query("SELECT title_ar FROM shop  WHERE id=".$id."");
		return $query->row()->title_ar;
	}
	function get_count_of_blog_post_comment($id)
	{
		$CI=& get_instance();
		$query=$CI->db->query("SELECT COUNT(blog_post_id) AS total_rows 
						FROM tbl_comment 
						WHERE blog_post_id='".$id."' and status = 1");
		$result=$query->row();
		return $result->total_rows;
	}
		function get_count_of_page_visit($page_name)
	{
		$CI=& get_instance();
		$query=$CI->db->query("SELECT COUNT(page_name) AS total_rows 
						FROM user_agent 
						WHERE page_name='".$page_name."' ");
		$result=$query->row();
		return $result->total_rows;
	}
	function get_comments_of_post($id)
	{
		$CI=& get_instance();
		$result=$CI->db->query("SELECT * 
						FROM tbl_comment 
						WHERE blog_post_id='".$id."' and status = 1");
		return $result;
	}
	/******************************************** menu and weekplan function**********************/
	
		function get_PackageMenu($id)
	{
		$CI=& get_instance();
		$result=$CI->db->query("SELECT * 
						FROM package_menu 
						WHERE package_id='".$id."' ");
		return $result;
	}
	function get_menu_options($subcate_id,$cat_id,$counter,$aSelected_ids="",$options_str=""){
		
		   $CI =& get_instance();
		  // echo "<pre>";
		  // print_r($aSelected_ids);
		  // echo "</pre>";
		  // die("in function");
           $sql="SELECT * FROM package_menu WHERE subcat ='".$subcate_id."'";
	
			$data= $CI->db->query($sql);
			if ($data->num_rows()>0)
			{
			   	  $option_html = '';
				    $counter_ =0;
				     foreach ($data->result() as $result){ 
					   $menu_id = $result->menu_option;
					  
						$checked="";			   
					   if(is_array($aSelected_ids) && count($aSelected_ids) > 0){
					     if(in_array($menu_id,$aSelected_ids)){
							 $checked = 'checked="checked"';	  
						    }
						}
					    $option_html .='<li><label><input type="checkbox"  
						name="menu_id[]" '.$checked.' id="menu_id_'.$menu_id.'" value="'.$menu_id.'" 
						onclick="strmenu(this.value,'.$counter.')"> '. get_title($result->menu_option). '</label>';
						$option_html .='</li>';
						 $val++;
						 $counter_++;
						 
						  }
						
						if($options_str!=''){
							$options_str = ','.$options_str;
							}
		 		$option_html .='<input type="hidden" id="result_'.$counter.'" name="category_id['.$cat_id.'_'.$subcate_id.']" value="'.$options_str.'">';
						 
				return  $option_html;
			
			}		   
		   
		   
		   }
		   
		   
	   
		   
	function get_childs ($p_id,$level,$selected='')
	{
		global $str;
		$CI=& get_instance();
		$query_childs=$CI->db->query("SELECT * FROM pages_tabs WHERE tab_id='$p_id' ORDER BY tab_name ASC");
		$result=$query_childs->row();
		if($selected==$p_id)
		{
			 $selected_Set='selected="selected"';	
		}
		else
		{
			$selected_Set='';
		}
				
		$str.='<option '.$selected_Set.'  value="'.$result->tab_id.'">'.ucfirst($level.$result->tab_name).'</option>';		
		$query_child1=$CI->db->query("SELECT * FROM pages_tabs WHERE tab_parent_id='$p_id' ORDER BY tab_name ASC");
		$level.="_";
		foreach($query_child1->result() as $tabs_name)
		{
			$p_id=$tabs_name->tab_id;
			get_childs ($p_id,$level,$selected);
		}
		return  $str;
	}
	
	function get_subpages($id)
	{
		$CI=& get_instance();
		$query=$CI->db->query("SELECT COUNT(tab_id) AS total_rows 
						FROM pages_tabs 
						WHERE tab_parent_id='".$id."'");
		$result=$query->row();
		return $result->total_rows;
	}
	function dtabs ()
	{
		global $str1;
		$return = '';
		$CI =& get_instance();
		$query=$CI->db->query("SELECT * FROM pages_tabs WHERE tab_parent_id=0 ORDER BY tab_name ASC");
		foreach($query->result() as $tabs)
		{
			$p_id=$tabs->tab_id;
			dctabs ($p_id,"");
		}
		return $str1;
	}
	function dctabs($pid,$level)
	{
		global $str1;
		$return='';
		$CI=& get_instance();
		$query_childs=$CI->db->query("SELECT * FROM pages_tabs WHERE tab_id='$pid' ORDER BY tab_name ASC");
		$result=$query_childs->row();
		$str1.='<li> 
				<a href=""> 
					<span> 
						'.ucfirst($level.$result->tab_name).'
					</span> 
				</a> 
				
				
				<a href="'.base_url().'view_pages/'.$result->tab_id.'" title="Add Data"> 
					<span style="float:right; margin-left:5px"> 
						<img src="'.base_url().'images/add_detail.png" width="25" style="margin-top:-9px"> 
				   </span> 
				</a> 
				<a href="'.base_url().'edit_tabs/'.$result->tab_id.'" title="Edit New"> 
					<span style="float:right; margin-left:5px"> 
						<img src="'.base_url().'images/edit.png" width="25" style="margin-top:-9px"> 
				   </span> 
				</a> 
				
				'?>
				<?php if ($result->tab_type==0){
				$str1.='<a href="'.base_url().'add_tab/'.$result->tab_id.'" title="Add new Page"> 
					<span style="float:right"> 
						<img src="'.base_url().'images/addnew.png" width="25" style="margin-top:-9px"> 
					</span> 
				</a>';
				}
        $str1.='

		</li>';
		$query_child1=$CI->db->query("SELECT * FROM pages_tabs WHERE tab_parent_id='$pid' ORDER BY tab_name ASC");
		$level.="_";
		foreach($query_child1->result() as $tabs_name)
		{
			$p_id=$tabs_name->tab_id;
			dctabs ($p_id,$level);
		}
		return  $str1;
	}
?>