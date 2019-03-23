var toggleMenu = document.querySelector(".mobileMenusContainer");
document.querySelector(".hamContainer").addEventListener("click", function() {
    toggleMenu.classList.toggle("open");
    if (toggleMenu.className == "mobileMenusContainer open") {
        document.body.style.overflow = "hidden";
        document.querySelector(".overlay").className = "overlay showOverlay";
        document.querySelector(".hamContainer").className = "hamContainer animate";

    } else {
        document.body.style.overflow = "scroll";
        document.querySelector(".overlay").className = "overlay";
        document.querySelector(".hamContainer").className = "hamContainer hamLineRed";
        if (window.location == "file:///Users/rahulalam/Desktop/Injiri/wp-content/themes/injiri-theme/injiri-htmls/index.html") {
            document.querySelector(".hamContainer").className = "hamContainer";
        } else {
            document.querySelector(".hamContainer").className = "hamContainer hamLineRed";
        }
    }
})

document.querySelector(".overlay").addEventListener("click", function() {
    if (toggleMenu.className = "mobileMenusContainer open") {
        toggleMenu.className = "mobileMenusContainer";
        document.body.style.overflow = "scroll";
        document.querySelector(".overlay").className = "overlay";
        document.querySelector(".hamContainer").className = "hamContainer";
        document.querySelector(".hamContainer").className = "hamContainer hamLineRed";
        if (window.location == "file:///Users/rahulalam/Desktop/Injiri/wp-content/themes/injiri-theme/injiri-htmls/index.html") {
            document.querySelector(".hamContainer").className = "hamContainer";
        } else {
            document.querySelector(".hamContainer").className = "hamContainer hamLineRed";
        }
    }
})

var accItem = document.getElementsByClassName('accordionItem');
var hideItem = document.getElementsByClassName("accordionItemHeading");
for (var i = 0; i < hideItem.length; i++) {
    hideItem[i].addEventListener("click", items, false);
}

function items() {
    var itemClass = this.parentNode.className;
    console.log(hideItem);
    for (i = 0; i < accItem.length; i++) {
        accItem[i].className = 'accordionItem off';
    }
    if (itemClass == 'accordionItem off') {
        this.parentNode.className = 'accordionItem open';
    }
}
// window.addEventListener("scroll", function() {
//     if (window.scrollY > 100) {
//         this.document.querySelector(".scrollDown").style.display = "none";
//     } else {
//         this.document.querySelector(".scrollDown").style.display = "block";
//     }
// });

// document.querySelector(".scrollDown").addEventListener("click", function() {
//     window.scrollTo(0, document.body.scrollHeight);
// });


// document.addEventListener("click", function() {

// })

// window.addEventListener("contextmenu", function(cDisable) {
//     cDisable.preventDefault();
// })