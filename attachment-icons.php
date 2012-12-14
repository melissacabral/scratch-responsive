<?php //fancy attachment icons
function get_attachment_icons($echo = false){
	$sAttachmentString = "<div class='documentIconsWrapper'>";
	//
	//  IF PDF
	//
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'post_mime_type' => 'application/pdf',  //MIME Type condition
	 ))){
		 
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$sAttachmentString .= "<div class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link' class='btn btn-large clearfix'>";
		//$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/pdf.png'/>";
		$sAttachmentString .= "<i class='icon-download icon-large'></i>";
		$sAttachmentString .= " Download $file_name[0]</a>";
		$sAttachmentString .= "</div>";
		}
	}
	//
	//  IF FLASH
	//
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'post_mime_type' => 'application/octet-stream',  //MIME Type condition
	 ))){
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$sAttachmentString .= "<div class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link' class='btn btn-large'>";
		//$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/flash.png'/>";
		$sAttachmentString .= "<i class='icon-bolt icon-large'></i>";
		$sAttachmentString .= " Download $file_name[0]</a>";
		$sAttachmentString .= "</div>";
		}
	}
	
	//
	//  IF POWERPOINT
	//
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'post_mime_type' => 'application/vnd.ms-powerpoint',  //MIME Type condition
	 ))){
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$sAttachmentString .= "<div class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link' class='btn btn-large clearfix'>";
		//$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/ppt.png'/>";
		$sAttachmentString .= "<i class='icon-film icon-large'></i>";
		$sAttachmentString .= " Download $file_name[0]</a>";
		$sAttachmentString .= "</div>";
		}
	}
	//
	//  IF TXT 
	//
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'post_mime_type' => 'text/plain',  //MIME Type condition
	 ))){
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$sAttachmentString .= "<div class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link' class='btn btn-large clearfix'>";
		//$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/txt.png'/>";
		$sAttachmentString .= "<i class='icon-file icon-large'></i>";
		$sAttachmentString .= " Download $file_name[0]</a>";
		$sAttachmentString .= "</div>";
		}
	}
	
	//
	//  IF ZIP
	//
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'post_mime_type' => 'application/zip',  //MIME Type condition
	 ))){
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$sAttachmentString .= "<div class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link' class='btn btn-large clearfix'>";
		//$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/zip.png'/>";
		$sAttachmentString .= "<i class='icon-folder-close icon-large'></i>";
		$sAttachmentString .= " Download $file_name[0]</a>";
		$sAttachmentString .= "</div>";
		}
	}

	//
	//  IF AUDIO
	//
	$mp3s = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'post_mime_type' => 'audio',  //MIME Type condition
	 ) );

	if (!empty($mp3s)) :
	
		foreach($mp3s as $mp3) :
    		$file_link = wp_get_attachment_url($mp3->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$sAttachmentString .= "<div class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link' class='btn btn-large clearfix'>";
		//$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/zip.png'/>";
		$sAttachmentString .= "<i class='icon-music icon-large'></i>";
		$sAttachmentString .= " Download $file_name[0]</a>";
		$sAttachmentString .= "</div>";
		endforeach;
	
	endif;
$sAttachmentString .= "</div>";
if($echo){
    echo $sAttachmentString;
  }
  return $sAttachmentString;
}
add_shortcode('attachment icons', 'get_attachment_icons');