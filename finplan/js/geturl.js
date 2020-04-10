function geturl()
{ var u=[] ;
  u.fp_loc = "<!-- Val fp_loc -->" ;
  u.fp_name = "<!-- Val fp_name -->" ;
  u.fp_dir = "<!-- Val fp_dir -->" ;
  u.fp_xmlfile = "<!-- Val fp_xmlfile -->" ;
  u.fp_xmlfile1 = "<!-- Val fp_xmlfile1 -->" ;
  u.fp_xmlfile2 = "<!-- Val fp_xmlfile2 -->" ;
  u.fp_xmlfile3 = "<!-- Val fp_xmlfile3 -->" ;
 if(window.location.search)
 {var n=window.location.search.substring(1).split(/&/),i=n.length;
  while(i-- > 0)
  { var nn=n[i].split(/=/);
    u[nn[0]]=nn[1];
  }
 }
  return u;
}
