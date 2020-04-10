function geturl()
{ 
 if(window.location.search)
 { 
  var u=[],n=window.location.search.substring(1).split(/&/),i=n.length;
  while(i-- > 0)
  { var nn=n[i].split(/=/); 
    u[nn[0]]=unescape(nn[1]);
  }
  return u;
 }
}
var Vals=geturl() ;
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}