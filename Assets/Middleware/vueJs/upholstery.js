const { createApp } = Vue;

createApp({
    data(){
        return{
            
        }
    },
    methods:{
        registerUser:function(e){
            e.preventDefault();
            var form = e.currentTarget;
            
            const vue = this;
            var data = new FormData(form);
            data.append("METHOD","registerUser");
            
            axios.post('Backend/connector.php',data)
            .then(function(r){
                if(r.data == "registerSuccessfully"){
                    alert("Successfully inserted the data");
                    window.location.href = "login.php";
                }
                else{
                    alert("Error saving user");
                }
            });
            
        },
        loginUser:function(e){
            e.preventDefault();
            var form = e.currentTarget;
            
            const vue = this;
            var data = new FormData(form);
            data.append("METHOD","loginUser");
            
            axios.post('Backend/connector.php',data)
            .then(function(r){
                if(r.data == "activeUser"){
                    window.location.href = "./Users/Customer/index.php";
                }else if(r.data == "admin"){
                    window.location.href = "./Users/Admin/index.php";
                }else if(r.data == "Employee" == 3){
                    window.location.href = "./Users/Employee/index.php";
                }else{
                    alert("No data existed!");
                }
            });
        },
        recommendation:function(e){
            e.preventDefault();
            var form = e.currentTarget;
            
            const vue = this;
            var data = new FormData(form);
            data.append("METHOD","doRecommendation");
            
            axios.post('Backend/connector.php',data)
            .then(function(r){
                if(r.data == "RecommendationSuccessfullyAdded"){
                    alert('Sends');
                    document.getElementById('reset').reset();
                }else{
                    alert("Not Send");
                }
            });
            
        }
    }
}).mount('#app')