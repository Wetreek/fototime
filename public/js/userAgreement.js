setTimeout(function() {
    console.clear();
    const achb1 = document.getElementById("ageCheckBox1");
    const achb2 = document.getElementById("ageCheckBox2");
    const achb3 = document.getElementById("ageCheckBox3");

    if(achb1){
        achb1.addEventListener("change", function() {
            if(this.checked){
                achb2.checked=true;
                achb3.checked=true;
            }
        });
    }
    if(achb2){
        achb2.addEventListener("change", function() {
            if(this.checked){
                achb3.checked=true;
            }
        });
    }

}, 100);