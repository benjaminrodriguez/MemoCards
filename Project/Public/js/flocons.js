/* url de votre image*/
var snowsrc="./Public/img/flavicon.png"
var no = 10;
var ns4up = (document.layers) ? 1 : 0;
var ie4up = (document.all) ? 1 : 0;
var nn6up = (document.getElementById) ? 1 : 0;
var dx, xp, yp;
var am, stx, sty;
var i, doc_width = 800, doc_height = 600;

if (ns4up) {
  doc_width = self.innerWidth;
  doc_height = self.innerHeight;
} else if (ie4up) {
  doc_width = document.body.clientWidth;
  doc_height = document.body.clientHeight;
} else if (nn6up) {
  doc_width = self.innerWidth;
  doc_height = self.innerHeight;}

dx = new Array();
xp = new Array();
yp = new Array();
am = new Array();
stx = new Array();
sty = new Array();

for (i = 0; i < no; ++ i) {
  dx[i] = 0;
  xp[i] = Math.random()*(doc_width-50);
  yp[i] = Math.random()*doc_height;
  am[i] = Math.random()*20;
  stx[i] = 0.02 + Math.random()/10;
  sty[i] = 0.7 + Math.random();
  if (ns4up) {
    if (i == 0) {
      document.write("<layer name=dot"+ i +" left=15 top=15 visibility=show><img src='"+snowsrc+"' border=0></layer>");
    } else {
      document.write("<layer name=dot"+ i +" left=15 top=15 visibility=show><img src='"+snowsrc+"' border=0></layer>");
    }
  } else if (ie4up || nn6up) {
    if (i == 0) {        document.write("<div id=dot"+ i +" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=0></div>");
    } else {
      document.write("<div id=dot"+ i +" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=0></div>");
    }
  }
}

function snowNS() {
  for (i = 0; i < no; ++ i) {
    yp[i] += sty[i];
    if (yp[i] > doc_height-50) {
      xp[i] = Math.random()*(doc_width-am[i]-30);
      yp[i] = 0;
      stx[i] = 0.02 + Math.random()/10;
      sty[i] = 0.7 + Math.random();
      doc_width = self.innerWidth;
      doc_height = self.innerHeight;
    }
    dx[i] += stx[i];
    document.layers["dot"+i].top = yp[i];
    document.layers["dot"+i].left = xp[i] + am[i]*Math.sin(dx[i]);
  }
  setTimeout("snowNS()", 10);
}

function snowIE() {
  for (i = 0; i < no; ++ i) {
    yp[i] += sty[i];
    if (yp[i] > doc_height-50) {
      xp[i] = Math.random()*(doc_width-am[i]-30);
      yp[i] = 0;
      stx[i] = 0.02 + Math.random()/10;
      sty[i] = 0.7 + Math.random();
      doc_width = document.body.clientWidth;
      doc_height = document.body.clientHeight;
    }
    dx[i] += stx[i];
    document.all["dot"+i].style.pixelTop = yp[i];
    document.all["dot"+i].style.pixelLeft = xp[i] + am[i]*Math.sin(dx[i]);
  }
  setTimeout("snowIE()", 10);
}

function snowNN6() {
  for (i = 0; i < no; ++ i) {
    yp[i] += sty[i];
    if (yp[i] > doc_height-50) {
      xp[i] = Math.random()*(doc_width-am[i]-30);
      yp[i] = 0;
      stx[i] = 0.02 + Math.random()/10;
      sty[i] = 0.7 + Math.random();
      doc_width = self.innerWidth;
      doc_height = self.innerHeight;
    }
    dx[i] += stx[i];
    document.getElementById("dot"+i).style.top = yp[i];
    document.getElementById("dot"+i).style.left = xp[i] + am[i]*Math.sin(dx[i]);
  }
  setTimeout("snowNN6()", 10);
}
if (ns4up) {
  snowNS();
} else if (ie4up) {
snowIE();
} else if (nn6up) {
snowNN6();
}