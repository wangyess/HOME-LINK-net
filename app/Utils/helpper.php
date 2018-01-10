<?php
function err($msg=null,$status=403){
   return response()->json(['success'=> false,'msg'=>$msg],$status);
}
function suc($data=null,$status=200){
    return response()->json(['success'=> true,'data'=>$data],$status);
}