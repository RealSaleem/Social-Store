<?php
namespace App\Helpers;
use Illuminate\Support\Facades\File;
Class Helper {
	public static function getFormatedDate($datetime){
		$date = date("d-m-Y", strtotime($datetime));
        return $date;
	}
	public static function getFormatedDateTime($datetime){
		$dateTime = date("d-m-Y h:i A", strtotime($datetime));
        return $dateTime;
	}
	/* delete/remove image or attachment from directory */
	public static function deleteAttachment($attachment)
	{
		$attachment_path = public_path().'/storage/'.$attachment;
        $attachment_path = str_replace('/', "\\", $attachment_path);
        // dd($attachment_path);
        // dd(File::exists($attachment_path));
        if(File::exists($attachment_path)) {
        	File::delete($attachment_path);
        	return true;
        } else {
        	return false;
        }
	}
}