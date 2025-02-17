const form= document.querySelector("form");
const password= document.getElementById("password");
const cpassword=document.getElementById("confirmpassword");
const age=document.getElementById("age");
const fullname=document.getElementById("name");
const errorpword=document.getElementById("error-password");
const errorcpword=document.getElementById("error-cpassword");
const errorage=document.getElementById("error-age");
const errorname=document.getElementById("error-name");

const passregex=/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
const nameregex=/^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;

const isvalidname=()=>{
    const validity=fullname.value.length !== 0 && nameregex.test(fullname.value);
    return validity;
};

const setnameclass=(isvalid)=>{
    fullname.className=isvalid ? "valid" : "invalid";
};

const updatenameerror=(isvalidinput)=>{
    if(isvalidinput){
        errorname.textContent="";
        errorname.removeAttribute("Class");
    }else{
        errorname.textContent="name must be between 2-50 characters and alphanumeric";
        errorname.setAttribute("class", "active");
    }
};

const handlenameinput=()=>{
    const nameinput=isvalidname();
    setnameclass(nameinput);
    updatenameerror(nameinput);
};


const isvalidpassword=()=>{
    const validity=password.value.length !== 0 && passregex.test(password.value);
    return validity;
};

const setpasswordclass=(isvalid)=>{
    password.className=isvalid ? "valid" : "invalid";
};

const updatepasserror=(isvalidinput)=>{
    if(isvalidinput){
        errorpword.textContent="";
        errorpword.removeAttribute("Class");
    }else{
        errorpword.textContent="password must be 8-20 characters, must contain one lowercase and uppercase alphabet and one letter and one special character";
        errorpword.setAttribute("class", "active");
    }
};

const handleinput=()=>{
    const passwordinput=isvalidpassword();
    setpasswordclass(passwordinput);
    updatepasserror(passwordinput);
};




const isvalidage=()=>{
    const validity=age.value>=18 && age.value<=100;
    return validity;
};

const setageclass=(isvalid)=>{
    age.className=isvalid ? "valid" : "invalid";
};

const updateageerror=(isvalidinput)=>{
    if(isvalidinput){
        errorage.textContent="";
        errorage.removeAttribute("Class");
    }else{
        errorage.textContent="age must be between 18 and 100";
        errorage.setAttribute("class", "active");
    }
};

const handleageinput=()=>{
    const ageinput=isvalidage();
    setageclass(ageinput);
    updateageerror(ageinput);
};








const isvalidcpassword=()=>{
    const validity=cpassword.value.length !== 0 && cpassword.value==password.value;
    return validity;
};

const setcpasswordclass=(isvalid)=>{
    cpassword.className=isvalid ? "valid" : "invalid";
};

const updatecpasserror=(validinput)=>{
    if(validinput){
        errorcpword.textContent="";
        errorcpword.removeAttribute("Class");
    }else{
        errorcpword.textContent="password must match initial password";
        errorcpword.setAttribute("class", "active");
    }
};

const chandleinput=()=>{
    const cpasswordinput=isvalidcpassword();
    setcpasswordclass(cpasswordinput);
    updatecpasserror(cpasswordinput);
};




const initializevalidation=()=>{
    const passwordinput=isvalidpassword();
    setpasswordclass(passwordinput);
    const cpasswordinput=isvalidcpassword();
    setcpasswordclass(cpasswordinput);
    const ageinput=isvalidage();
    setageclass(ageinput);

    const nameinput=isvalidname();
    setnameclass(nameinput);
    };


const handlesubmit=(event) =>{

if(password.className!=="valid" || cpassword.className!=="valid"||age.className!=="valid" || fullname.className!=="valid"){
    event.preventDefault();
};

};

window.addEventListener("load", initializevalidation);
password.addEventListener("input", handleinput);
cpassword.addEventListener("input", chandleinput);
age.addEventListener("input", handleageinput);
fullname.addEventListener("input", handlenameinput);
form.addEventListener("submit", handlesubmit);
