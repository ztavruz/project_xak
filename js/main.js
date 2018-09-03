
$(function(){
  // if(window.location.pathname == "/sitePages/userPage.php"){
  //
  //   document.querySelector('.contain__foto').classList.add("contain__foto-active");
  // }

      document.querySelector("#showMyFoto").onclick = function(){
      document.querySelector(".contain__foto").classList.add("contain__foto-active");
  }

  let avatarButton = new Shower('#avatarbutton');
  let avatarLabel = new Shower('#avatar__label');

  avatarButton.hide();

  document.querySelector('#avatar__loader').onchange = function(){
    avatarButton.show();
    avatarLabel.hide();
  }
  // console.log(document.querySelectorAll('#avatar__loader'));
});
