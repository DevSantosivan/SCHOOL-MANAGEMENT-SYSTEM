const body = document.querySelector("body"),
        sidebar = body.querySelector(".sidebar"), 
        container = body.querySelector(".container"), 
        toggle = body.querySelector(".toggle"),
        profiles = body.querySelector(".image-user"),
        btnpopup = body.querySelector(".btn-add"),
        btnpopups = body.querySelector(".btn-edit"),
        exiticon = body.querySelector(".exit-icon"),
        fileupload = body.querySelector(".input-file"),
        profilepic = body.querySelector(".profile-pic-img"),
        selectmenu = body.querySelector(".selct-menu"),
        selectbtn = body.querySelector(".select-btn"),
        options = body.querySelectorAll(".option"),
        optiontext = body.querySelector(".option-result");

        toggle.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
            container.classList.toggle("containers");
        })

    //     btnpopup.addEventListener("click", function() {
    //     var content = document.getElementById("contents");
    //     if (content.classList.contains("hidden")) {
    //         content.classList.remove("hidden");
    //     } else {
    //         content.classList.add("hidden");
    //     }
    // });
    exiticon.addEventListener("click", function() {
        var content = document.getElementById("content");
        if (content.classList.contains("hidden")) {
            content.classList.remove("hidden");
        } else {
            content.classList.add("hidden");
        }
    });


    // image upload and display
    fileupload.onchange = function(){
        profilepic.src = URL.createObjectURL(fileupload.files[0]);
    }

    function optiondisplay(){
        let optiondisplay = document.getElementById("options");
        if(optiondisplay.style.display === "none"){
            optiondisplay.style.display = "flex";
        }else{
            optiondisplay.style.display = "none";
        }
    };
  
    options.forEach(option =>{
        option.addEventListener("click", ()=>{
            let selectOption = option.querySelector(".option-text").innerText;
            optiontext.innerText = selectOption;
        })
    })



    new DataTable('#example', {
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        }
    });
