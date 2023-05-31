const toTopBtn = document.getElementById("btnToTop");

        function showToTopBtn(){
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                toTopBtn.style.display = "flex";
            } else {
                toTopBtn.style.display = "none";
            }
        }
document.addEventListener("scroll", showToTopBtn);