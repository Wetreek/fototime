setTimeout(function() {
    console.clear();
    const preview = document.getElementById("previewPhoto");
    const upload = document.getElementById("inputPhoto");
    const invalidDimensions = document.getElementById("invalidPhotoDimensions");
    const invalidType = document.getElementById("invalidPhotoType");
    const btnPhotoUpload = document.getElementById("btnPhotoUpload");

    const requirdWidth = upload.getAttribute("width");
    const requirdHeight = upload.getAttribute("height");
    
    upload.addEventListener("change", function() {
        
        const file = this.files[0];
        if(file) {
            if((/^image\/(jpe?g)$/).test(file.type)){
                invalidType.style.display="none";

                const img = new Image();
                img.addEventListener("load", function(){
                    if(this.width!=requirdWidth || this.height!=requirdHeight){
                        invalidDimensions.style.display="block";
                        btnPhotoUpload.disabled=true;
                    }
                    else{
                        invalidDimensions.style.display="none";

                        const reader = new FileReader();
                        preview.style.display="block";

                        reader.addEventListener("load", function() {
                        preview.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                        }
                });
                img.src= window.URL.createObjectURL(file);
                btnPhotoUpload.disabled=false;

                
            }
            else{
                invalidType.style.display="block";
                btnPhotoUpload.disabled=true;
            }
            
        }
        else {
            preview.style.display="none";
        }
    });
}, 100);
