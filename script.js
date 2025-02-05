const carousel = document.querySelector('.carousel');
let arrows = document.querySelectorAll(".wrapper i"); 
let images = document.querySelectorAll('.card');
let count = 0 ;
// console.log(carousel +"<br>"+arrows)
arrows = Array.from(arrows);
images = Array.from(images);
console.log(images);
let limit = -4;
let deviceVW = window.innerWidth;
let toShift = 410;
let imageWidth = 300;//pixel
// console.log("Viewport width: " + viewportWidth);
arrows.forEach(ele =>{
    ele.addEventListener("click",()=>{
        console.log(ele.id);
        if(ele.id == 'left' && count<0){
            count++;
            slide();
        }
        else if(ele.id == 'right' && count > limit){
            count--;
            slide();
        }
    })
})
function slide(){
    images.forEach(ele =>{
        let x = count * toShift;
        console.log(x);
        ele.style.transform = `translateX(${x}px)`;
    })
}

// chatgpt->
function handleScreenSizeChange(event) {
    if (event.matches) {
      console.log("Small screen detected! Applying mobile script.");
      // Example: Change navbar to a mobile menu
        limit = -6;
        toShift =deviceVW + imageWidth;

    } else {
      console.log("Large screen detected! Applying desktop script.");
      limit = -4;
      toShift = 410;
    }
  }
  
  // Define media query (e.g., max-width: 768px for mobile)
  const mediaQuery = window.matchMedia("(max-width: 700px)");
  
  // Call function on load
  handleScreenSizeChange(mediaQuery);
  
  // Listen for screen size changes
  mediaQuery.addEventListener("change", handleScreenSizeChange);

//   Navigation Side Bar for Mobile
let anchors = document.querySelectorAll(".mobAnchor");
let dropdowns = document.querySelectorAll(".mobDD");
dropdowns = Array.from(dropdowns);
anchors = Array.from(anchors);
// console.log(anchors , dropdowns);
anchors.forEach((anchor,index)=>{
    let curStatus = 'none';
    anchor.addEventListener("click",()=>{
        dropdowns.forEach(ele=>{
            ele.style.display = 'none';
        })
        if(curStatus=='none'){
            curStatus='block';
            dropdowns[index].style.display = 'block';
            console.log("shown");
        }
        else if(curStatus = 'block'){
            curStatus='none';
            dropdowns[index].style.display='none';
            console.log("hidden");
        }
    });   
})
let displaySideBar = document.getElementById("show");
let hideSideBar=document.getElementById("hide");
let sideBar = document.getElementById("sideBar");
displaySideBar.addEventListener("click",()=>{
    sideBar.style.transform ="translateX(0)";
});
hideSideBar.addEventListener("click",()=>{
    sideBar.style.transform = "translateX(-100%)";
})
  



