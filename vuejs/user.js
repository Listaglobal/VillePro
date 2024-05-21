const validatePhoneNumber = (input) => {
    const regExp = /^[0-9,+]+$/
    const phone = String(input);
    const validate = phone.match(regExp);
    var number;
    var bool;
    if (validate) {
        const test = phone.includes("+234");
        const secondTest = (test) ? phone.includes("+2340") : false;

        (test && secondTest) ? number = phone.replace("+2340", "0") : "";
        (test && !secondTest) ? number = phone.replace("+234", "0") : ""

        const thirdTest = (!test && !secondTest) ? phone.includes("234") : false;
        const fourthTest = (thirdTest) ? phone.includes("2340") : false;

        (thirdTest && fourthTest) ? number = phone.replace("2340", "0") : "";
        (thirdTest && !fourthTest) ? number = phone.replace("234", "0") : "";



        if (!number) {
            const finalTest = phone.startsWith("0")
            if (finalTest) {
                (phone.length < 11 || phone.length > 11) ? number = false : number = phone;
                return number
            } else {
                bool = false
                return bool
            }
        } else {
            (number.length < 11 || number.length > 11) ? number = false : number = number;
            return number
        }

    } else {
        bool = false
        return bool;
    }
}

const days_difference = (day1, day2) => {
    var day1 = new Date(day1);
    var day2 = new Date(day2);

    var differnce_in_time = day2.getTime() - day1.getTime();
    var days_difference = differnce_in_time / (1000 * 3600 * 24);

    return days_difference;
}

function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);

    // get Format 
    let dd = result.getDate();
    let mm = result.getMonth() + 1;
    let yyyy = result.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    let result_format = yyyy + '-' + mm + '-' + dd;

    return result_format;
}

const urlPath = window.location.pathname.split("/");
const length = urlPath.length;
const webPage = urlPath[length - 1];

let getUrlParams = new URLSearchParams(window.location.search);

const getFileExtension = (filename) => {

    // get file extension
    const extension = filename.split('.').pop();
    return extension;
}

var today = new Date()
let curentYearMonth = today.getFullYear() + "-" + today.getMonth() + 1;

var salesStatistics;
var orderStatistics;

let app = Vue.createApp({
    data() {
        return {
            // General utilites
            generalFunctions: new GeneralFunction({ apiPath: "user" , logoutUrl : "staffLogin.php" }),
            images: null,
            loading: null,
            currentPage: null,
            currentExportPage: null,
            totalData: null,
            totalPage: null,
            per_page: 10,
            exportPer_page: 100,
            totalExportPage: null,
            class_active: null,
            reset_token: null,
            search: null,
            sort: null,
            sortValue: "",
            discoValue: "",
            // baseUrl:'',
            baseUrl: 'http://localhost/dorchester_consultancy/',
            first_name: null,
            last_name: null,
            gender: null,
            address: null,
            occupation_or_work: null,
            total_payment: null,
            no_of_people: null,
            imagefile: null,
            itemDetails: null,
            imageSent: null,
            pathname: null,
            success: null,
            daily: null,
            weekly: null,
            monthly: null,
            location: null,
            team: null,

            // login details
            email: null,
            password: null,
            confirm_password: null,
            username: null,
            name: null,
            token: null,
            adminDetails: null,
            superAdmin: null,
            admin_initials: null,
            admin_level: null,
        }
    },
    methods: {
        //general utilities
        getToken() {
            const token = window.localStorage.getItem("token");
            this.token = (token) ? token : null;
        },
        logout() {
            window.localStorage.removeItem("token");
            window.location = this.baseUrl + "staffLogin.php";
        },
        async nextPage() {
            this.currentPage = parseInt(this.currentPage) + 1;
            this.totalData = null;
            this.totalPage = null;
        },
        async previousPage() {
            this.currentPage = parseInt(this.currentPage) - 1;
            this.totalData = null;
            this.totalPage = null;
        },
        async setNoPerPage(no) {
            this.per_page = no;
            this.class_active = true;
        },
        swalToast(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: false,
            })
            Toast.fire({
                icon: icon,
                title: title
            })
        },
        async uploadImage(event) {
            this.imageSent = event.target.files[0];
        },

        async onLoading() {
            this.loading = true;
        },
        async onCompleted() {
            this.loading = false;
        },
        async onSuccess(successText, successData) {
            this.generalFunctions.swalToast('success', successText);
        },

        async onError(error) {
            this.generalFunctions.swalToast('error', error);
        },

        async callPostRequest(data, url, headers, onSuccess, canNavOn401 = 1) {
            let responseData = await this.generalFunctions.postRequest(data, url, headers, this.onLoading, this.onCompleted, (successStatus, success, successData) => {
                this.onSuccess(success, successData);
                if (typeof onSuccess === 'function') {
                    onSuccess(successStatus, successData);
                }
            }, this.onError, canNavOn401);
        },

        async callGetRequest( url, headers, onSuccess, showToast = 1){
            let responseData = await this.generalFunctions.getRequest(url, headers, this.onLoading, this.onCompleted, (successStatus, success, successData) =>{
                // if ( showToast == 1 ) this.onSuccess(success, successData);
                if ( typeof onSuccess === 'function' ) {
                    onSuccess(successStatus, successData);
                }
            }, this.onError);
        },


        // AUTH
        async Login() {
            if (!this.email || !this.password) {
                this.generalFunctions.swalToast("error", "Kindly Enter all Fields")
                return
            }
            const url = `auth/login.php`;
            let data = {
                "email": this.email,
                "password": this.password,
            };
            let headers = {
                "Content-type": "application/json",
            };
            await this.callPostRequest(data, url, headers, (successStatus, successData) => {
                if (!successData) {
                    return;
                }
                let token = successData.token;
                window.localStorage.setItem("token", token);
                window.location = `${this.baseUrl}staff/index.php`;
            }, 2);
        },

        //contact us
        async sbtContactForm(){
            
            if (!this.email || !this.phoneNumber || !this.message || !this.name || !this.location || !this.team) {
                this.generalFunctions.Toastinator("error","Kindly Enter all Fields")
                return
            }
            const url = `joinUs.php`;
            let data = {
                "email": this.email,
                "phone": this.phoneNumber,
                "location": this.location,
                "message" : this.message,
                "team": this.team,
                "name": this.name
            };
            let headers = {
                "Content-type": "application/json",
            };
            let responseData = await this.callPostRequest(data, url, headers, ( successStatus, successData) => {
                if ( !successData ){
                   return; 
                }
                window.location = `${this.baseUrl}index.php`;
                this.email = this.phoneNumber = this.message = this.name = null;
                
            }, 1);
        },
        
    },
    async beforeMount() {
        this.pathname = window.location.href;
        if (!webPage.includes("login.php") && !webPage.includes("login")) {
            window.localStorage.setItem("dorchesterServicesCurrentPage", webPage);
            this.loading = true;
            this.getToken();
            // this.getAdminDetails();
            if (!this.token) {
                window.location = `${this.baseUrl}login.php`;
            }
        }

        
    },
    async mounted() {
        if (webPage === 'index.php' || webPage === 'index' || webPage === '') {
            
        }

        
        
    }
})

app.mount("#user");
