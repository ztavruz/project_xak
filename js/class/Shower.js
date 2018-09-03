class Shower{
  constructor(elem){
    this.elem = document.querySelector(elem);
    // this.prop = prop;
    // this.value = value;
  }

  hide(){
    this.elem.style.display = "none";
  }
  show(){
    this.elem.style.display = "inline";
  }

}
