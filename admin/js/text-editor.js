// define vars
const editor = document.getElementsByClassName('content-box')[0];
// const toolbar = editor.getElementsByClassName('toolbar')[0];
// const buttons = toolbar.querySelectorAll('.editor-btn:not(.has-submenu)');
// const contentArea = editor.getElementsByClassName('content-area')[0];
// const visuellView = contentArea.getElementsByClassName('visuell-view')[0];
// const htmlView = contentArea.getElementsByClassName('html-view')[0];
// const modal = document.getElementsByClassName('editor-modal')[0];

$("#save").click(function(e){
  e.preventDefault();
  alert($('.content-box').val());
})
