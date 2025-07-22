currentMenuItem = "";
menuItemNormal = "";

function setCurrentMenuItem(item, normal) {
  if(currentMenuItem != MM_findObj(item)) {
    currentMenuItem.src = menuItemNormal;
    currentMenuItem = MM_findObj(item);
    menuItemNormal = normal;
  }
}

function setBgImage(element,imageFile) {
  element.style.backgroundImage="url("+imageFile+")";
  //element.style.color="#374862";
}

function setBgImageOver(element,imageFile) {
  element.style.backgroundImage="url("+imageFile+")";
  //element.style.color="#FFFFFF";
}

function toggleList(id) {
  list = document.getElementById(id);
  if (list.style.display == "inline") {
    list.style.display = "none";
  } else {
    list.style.display = "inline";
  }
}

function winPopup(mypage, myname, w, h, scroll) {
  var winl = (screen.width - w) / 2;
  var wint = (screen.height - h) / 2;
  winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable,status'
  win = window.open(mypage, myname, winprops)
    if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); 
  }
}

function changeColor(color){
  var el=event.srcElement
  if (el.tagName=="INPUT"&&el.type=="button")
  event.srcElement.style.backgroundColor=color
}

function MM_swapImgRestore() {
  var i,x,a=document.MM_sr;
  for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) {
    if(x!=currentMenuItem)
      x.src=x.oSrc;
  }
}

function MM_preloadImages() {
  var d=document;
  if(d.images){
    if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments;
    for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0) {
      d.MM_p[j]=new Image;
      d.MM_p[j++].src=a[i];
    }
  }
}

function MM_findObj(n, d) {
  var p,i,x;
  if(!d) d=document;
  if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
  }
  if(!(x=d[n])&&d.all) x=d.all[n];
  for (i=0;!x&&i<d.forms.length;i++)
    x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++)
    x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n);
    return x;
}

function MM_swapImage() {
  var i,j=0,x,a=MM_swapImage.arguments;
  document.MM_sr = new Array;
  for(i=0;i<(a.length-2);i+=3) {
    if ((x=MM_findObj(a[i]))!=null) {
      document.MM_sr[j++]=x;
      if(x!=currentMenuItem) {
        if(!x.oSrc) x.oSrc=x.src;
        x.src=a[i+2];
      }
    }
  }
}
