document.getElementById("open-model-btn-1").addEventListener("click", function() {
    document.getElementById("modal-win").classList.add("open");
    
});

document.getElementById("modal-win-box-btn").addEventListener("click", function () {
    document.getElementById("modal-win").classList.remove("open");
});

document.getElementById("button-submit").addEventListener("click", function () {
    document.getElementById("modal-win").classList.remove("open");
});
