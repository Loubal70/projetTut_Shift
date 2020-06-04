function ouvrirmenu(){
    let menu = document.getElementById("menu");
    menu.style.height="100vh";
    let iconemenuo = document.getElementById("iconemenuo");
    iconemenuo.style.display="none";
    let iconemenuc = document.getElementById("iconemenuec");
    iconemenuc.style.display="block";
}

function fermermenu(){
    let menu = document.getElementById("menu");
    menu.style.height="0";
    let iconemenuo = document.getElementById("iconemenuo");
    iconemenuo.style.display="block";
    let iconemenuc = document.getElementById("iconemenuec");
    iconemenuc.style.display="none";
}
