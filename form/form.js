let resultform;
let tatal;
let inputname = document.getElementById('floatingInput').value;
function submit_form(){
    let selectedValue1 = parseInt(document.querySelector('input[name="interest1"]:checked')?.value || 0);
    let selectedValue2 = parseInt(document.querySelector('input[name="interest2"]:checked')?.value || 0);
    let selectedValue3 = parseInt(document.querySelector('input[name="interest3"]:checked')?.value || 0);
    let selectedValue4 = parseInt(document.querySelector('input[name="interest4"]:checked')?.value || 0);
    let selectedValue5 = parseInt(document.querySelector('input[name="interest5"]:checked')?.value || 0);
    let selectedValue6 = parseInt(document.querySelector('input[name="interest6"]:checked')?.value || 0);
    let selectedValue7 = parseInt(document.querySelector('input[name="interest7"]:checked')?.value || 0);
    let selectedValue8 = parseInt(document.querySelector('input[name="interest8"]:checked')?.value || 0);
    let selectedValue9 = parseInt(document.querySelector('input[name="interest9"]:checked')?.value || 0);
    let selectedValue10 = parseInt(document.querySelector('input[name="interest10"]:checked')?.value || 0);
    // 1
    let selectedOption1 = document.querySelector('input[name="interest1"]:checked');
    if(selectedOption1) {
        let selectedValue1 = selectedOption1.value;
        console.log("Selected value: " + selectedValue1);
    } else {
        console.log("No option selected");
    }
    // 2
    let selectedOption2 = document.querySelector('input[name="interest2"]:checked');
    if(selectedOption2) {
        let selectedValue2 = selectedOption2.value;
        console.log("Selected value: " + selectedValue2);
    } else {
        console.log("No option selected");
    }
    // 3
    let selectedOption3 = document.querySelector('input[name="interest3"]:checked');
    if(selectedOption3) {
        let selectedValue3 = selectedOption3.value;
        console.log("Selected value: " + selectedValue3);
    } else {
        console.log("No option selected");
    }
    // 4
    let selectedOption4 = document.querySelector('input[name="interest4"]:checked');
    
    if(selectedOption4) {
        let selectedValue4 = selectedOption4.value;
        console.log("Selected value: " + selectedValue4);
    } else {
        console.log("No option selected");
    }
    // 5
    let selectedOption5 = document.querySelector('input[name="interest5"]:checked');
    
    if(selectedOption5) {
        let selectedValue5 = selectedOption5.value;
        console.log("Selected value: " + selectedValue5);
    } else {
        console.log("No option selected");
    }
    // 6
    let selectedOption6 = document.querySelector('input[name="interest6"]:checked');
    
    if(selectedOption6) {
        let selectedValue6 = selectedOption6.value;
        console.log("Selected value: " + selectedValue6);
    } else {
        console.log("No option selected");
    }
    // 7
    let selectedOption7 = document.querySelector('input[name="interest7"]:checked');
    
    if(selectedOption7) {
        let selectedValue7 = selectedOption7.value;
        console.log("Selected value: " + selectedValue7);
    } else {
        console.log("No option selected");
    }
    // 8
    let selectedOption8 = document.querySelector('input[name="interest8"]:checked');
    
    if(selectedOption8) {
        let selectedValue8 = selectedOption8.value;
        console.log("Selected value: " + selectedValue8);
    } else {
        console.log("No option selected");
    }
    // 9
    let selectedOption9 = document.querySelector('input[name="interest9"]:checked');
    
    if(selectedOption9) {
        let selectedValue9 = selectedOption9.value;
        console.log("Selected value: " + selectedValue9);
    } else {
        console.log("No option selected");
    }
    // 10
    let selectedOption10 = document.querySelector('input[name="interest10"]:checked');
    
    if(selectedOption10) {
        let selectedValue10 = selectedOption10.value;
        console.log("Selected value: " + selectedValue10);
    } else {
        console.log("No option selected");
    }

    // ผลรวม
    tatal = selectedValue1 + selectedValue2 + selectedValue3 + selectedValue4 + selectedValue5 + selectedValue6 + selectedValue7 + selectedValue8 + selectedValue9 + selectedValue10;
    console.log(tatal);
    resultform = document.getElementById('resutl');
    if (tatal >= 12) {
        resultform.innerHTML = "คะแนนที่ได้คือ"+ " " + tatal + " " +"ผู้สูงอายุที่พึ่งตนเองได้ ช่วยเหลือผู้อื่น ชุมชนและสังคมได้ (กลุ่มติดสังคม)";
    } else if (tatal >= 5 && tatal <= 11) {
        resultform.innerHTML = "คะแนนที่ได้คือ"+ " " + tatal + " " + "ผู้สูงอายุที่ดูแลตนเองได้บ้าง ช่วยเหลือตนเองได้บ้าง (กลุ่มติดบ้าน)";
    } else if (tatal >= 0 && tatal <= 4) {
        resultform.innerHTML = "คะแนนที่ได้คือ"+ " " + tatal + " " +"ผู้สูงอายุที่พึ่งตนเองไม่ได้ ช่วยเหลือตนเองไม่ได้ พิการ หรือทุพพลภาพ (กลุ่มติดเตียง)";
    } else {
        resultform.innerHTML = "คะแนนไม่ถูกต้อง";
    }

    let resutl_name = document.getElementById('resutl_name');
    resutl_name.innerHTML = "ผลการประเมินของคุณ" + inputname;
}