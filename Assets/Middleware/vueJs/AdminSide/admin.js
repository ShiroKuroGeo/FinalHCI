const { createApp } = Vue;

//Product Side Vue Js
const productSide = createApp({
    data(){
        return{
            products: [],
            productId: 0,
            productLength: 0
        }
    },
    methods:{
        addProduct:function(e){
            e.preventDefault();
            var form = e.currentTarget;
            const vue = this;
            var data = new FormData(form);
            data.append("METHOD","doInsertProduct");
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                if(r.data == "SuccessfullyInserted"){
                    toastr.success('Successfully Added')
                    vue.getProduct();
                    $('#resetAddForm')[0].reset();
                }
            });
        },
        getProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetProductAdmin");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.products = [];
                for(var v of r.data){
                    vue.products.push({
                        productId: v.productId,
                        productName: v.productName,
                        productImage: v.productImage,
                        quantity: v.quantity,
                        category: v.category,
                        status: v.status,
                        price: v.price
                    })
                }
                vue.productLength = r.data.length;
                return vue.productLength;
            });
            
        },
        getProductId:function(productId){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getProductId");
            data.append('productId',productId);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                for(var v of r.data){
                    vue.productId = v.productId;
                }
            });
            
        },
        updateProduct:function(productId){
            if(confirm('Are you sure you want to delete this status')){
                const vue = this;
                var data = new FormData();
                data.append("METHOD","doChangeStatus");
                data.append("productId",productId);
                data.append("status", 1);
                axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
                .then(function(r){
                    if(r.data == "SuccessfullyUpdated"){
                        toastr.success("Succesfully Updated");
                        vue.getProduct();
                    }else{
                        toastr.danger(r.data);
                    }
                });
            }else{
                toastr.info("Cancel ");
            }
        },
        doDeleteProduct:function(productId){
            if(confirm("Are you sure you want to delete this product")){
                const vue = this;
                var data = new FormData();
                data.append("METHOD","doDeleteProduct");
                data.append("productId",productId);
                axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
                .then(function(r){
                    if(r.data == "SuccessfullyDeleteProduct"){
                        toastr.success('Succesfully Deleted');
                        vue.getProduct();
                    }else{ 
                        toastr.error(r.data)
                    }   
                });
            }else{
                toastr.info("Cancel Deletion");
            }
        }
    },
    created:function(){
        this.getProduct();
    }
})

//Customer Side Vue Js
const customerSide = createApp({
    data(){
        return{
            customer: [],
            customerId: 0
        }
    },
    methods:{
        getCustomer:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetCustomer");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.customer = [];
                for(var v of r.data){
                    vue.customer.push({
                        userId: v.userId,
                        fullname: v.fullname,
                        email: v.email,
                        phoneNumber: v.phoneNumber,
                        role: v.role,
                        status: v.status,
                        profileImage: v.profileImage,
                        dateCreated: v.dateCreated,
                        dateUpdated: v.dateUpdated
                    })
                }
            });    
        },
        updateUser:function(userId, status){
            if(status = 1){
                if(confirm("Are you sure you want to Inactive this account?")){
                    status = status == 1 ? 2 : 1;
                    const vue = this;
                    var data = new FormData();
                    data.append("METHOD","doUpdateCustomer");
                    data.append("userId",userId);
                    data.append("status",status);
                    axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
                    .then(function(r){
                        if(r.data == "SuccessfullyUpdated"){
                            toastr.success("Successfull Updated");
                            vue.getCustomer();
                        }
                    });
                }
            }else if(status = 2){
                if(confirm("Are you sure you want to Active this account?")){
                    status = status == 1 ? 2 : 1;
                    const vue = this;
                    var data = new FormData();
                    data.append("METHOD","doUpdateCustomer");
                    data.append("userId",userId);
                    data.append("status",status);
                    axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
                    .then(function(r){
                        if(r.data == "SuccessfullyUpdated"){
                            toastr.success("Successfull Updated");
                            vue.getCustomer();
                        }
                    });
                }
            }
        },
    },
    created:function(){
        this.getCustomer();
    }
})

const recommendationSide = createApp({
    data(){
        return{
            recommendation: [],
            recommendationId: [],
            trash: [],
            trashed: 0,
            recom: 0
        }
    },
    methods:{
        getRecommendation:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetRecommendation");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.recommendation = [];
                for(var v of r.data){
                    vue.recommendation.push({
                        recomId: v.recomId,
                        recomName: v.recomName,
                        recomEmail: v.recomEmail,
                        recomPhone: v.recomPhone,
                        recomMessage: v.recomMessage,
                        recomStatus: v.recomStatus,
                        recomTrashStatus: v.recomTrashStatus,
                        recomDate: v.recomDate
                    })
                }
                vue.recom = r.data.length;
                return vue.recom;
            });
        },
        getRecommendationId:function(){
            var searchParams = new URLSearchParams(window.location.search);
            var recomId = searchParams.get("recomId");

            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetRecommendationId");
            data.append("recomId",recomId);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.recommendationId = [];
                for(var v of r.data){
                    vue.recommendationId.push({
                        recomId: v.recomId,
                        recomName: v.recomName,
                        recomEmail: v.recomEmail,
                        recomPhone: v.recomPhone,
                        recomMessage: v.recomMessage,
                        recomStatus: v.recomStatus,
                        recomDate: v.recomDate,
                        length: v.length
                    })
                }
            });  
        }
    },
    created:function(){
        this.getRecommendation();
        this.getRecommendationId();
    }
})

const dashboardSide = createApp({
    data(){
        return{
            customer: [],
            products: [],
            orders: [],
            productLength: 0,
            customerLength: 0,
            recommendationLenght: 0,
            ordersLength: 0
        }
    },
    methods:{
        getCustomer:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetCustomer");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.customer = [];
                for(var v of r.data){
                    vue.customer.push({
                        fullname: v.fullname,
                        email: v.email,
                        phoneNumber: v.phoneNumber,
                        role: v.role,
                        status: v.status,
                        profileImage: v.profileImage,
                        dateCreated: v.dateCreated,
                        dateUpdated: v.dateUpdated
                    })
                }
                vue.customerLength = r.data.length;
                return vue.customerLength;
            });   
        },
        getProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetProductAdmin");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.products = [];
                for(var v of r.data){
                    vue.products.push({
                        productId: v.productId,
                        productName: v.productName,
                        productImage: v.productImage,
                        quantity: v.quantity,
                        category: v.category,
                        status: v.status,
                        price: v.price
                    })
                }
                vue.productLength = r.data.length;
                return vue.productLength;
            });
            
        },
        getRecommendation:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetRecommendation");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.recommendationLenght = r.data.length;
                return vue.recommendationLenght;
            });
        },
        getAllOrder:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetAllOrder");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.orders = [];
                for(var v of r.data){
                    vue.orders.push({
                        fullname: v.fullname,
                        email: v.email,
                        phoneNumber: v.phoneNumber,
                        username: v.username,
                        role: v.role,
                        postalCode: v.postalCode,
                        city: v.city,
                        province: v.province,
                        barangay: v.barangay,
                        productImage: v.productImage,
                        productName: v.productName,
                        productDescr: v.productDescr,
                        quantity: v.quantity,
                        category: v.category,
                        size: v.size,
                        status: v.status,
                        dateOrdered: v.dateOrdered,
                        dateDeliver: v.dateDeliver
                    })
                }
                vue.ordersLength = r.data.length;
                return vue.ordersLength;
            });
        }
    },
    created:function(){
        this.getCustomer();
        this.getProduct();
        this.getRecommendation();       
        this.getAllOrder();
    }
})

const orderSide = createApp({
    data(){
        return{
            orders: [],
            invoice: [],
            userId: 1,
            status: 1,
            count: 1,
            dateOrdered: '',
            fullname: '',
            province: '',
            barangay: '',
            city: '',
            postalCode: '',
            phoneNumber: 0,
            email: '',
            myOrderId: 0,
            dateDeliver: '',
            price: 0,
            quantity: 0,
            totalPriceOrders: 0,
        }
    },
    methods:{
        getAllOrder:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetAllOrder");
            
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.orders = [];
                for(var v of r.data){
                    vue.orders.push({
                        myOrderId: v.myOrderId,
                        userId: v.userId,
                        fullname: v.fullname,
                        email: v.email,
                        phoneNumber: v.phoneNumber,
                        username: v.username,
                        role: v.role,
                        postalCode: v.postalCode,
                        city: v.city,
                        province: v.province,
                        barangay: v.barangay,
                        productImage: v.productImage,
                        productName: v.productName,
                        productDescr: v.productDescr,
                        quantity: v.quantity,
                        price: v.price,
                        category: v.category,
                        size: v.size,
                        status: v.status,
                        dateOrdered: v.dateOrdered,
                        dateDeliver: v.dateDeliver
                    })
                }
                vue.ordersLength = r.data.length;
                return vue.ordersLength;
            });
        },
        getInvoice:function(){
            var searchParams = new URLSearchParams(window.location.search);
            var invoiceId = searchParams.get("invoice");

            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetInvoice");
            data.append("invoiceId", invoiceId);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.invoice = [];
                for(var v of r.data){
                    vue.invoice.push({
                        myOrderId: v.myOrderId,
                        userId: v.userId,
                        fullname: v.fullname,
                        email: v.email,
                        phoneNumber: v.phoneNumber,
                        username: v.username,
                        role: v.role,
                        postalCode: v.postalCode,
                        city: v.city,
                        province: v.province,
                        barangay: v.barangay,
                        productImage: v.productImage,
                        productName: v.productName,
                        productDescr: v.productDescr,
                        quantity: v.quantity,
                        price: v.price,
                        category: v.category,
                        size: v.size,
                        status: v.status,
                        dateOrdered: v.dateOrdered,
                        totalPriceOrders: v.totalPriceOrders,
                        dateDeliver: v.dateDeliver
                    })
                    vue.dateOrdered = v.dateOrdered,
                    vue.fullname = v.fullname;
                    vue.province = v.province;
                    vue.barangay = v.barangay;
                    vue.city = v.city;
                    vue.postalCode = v.postalCode;
                    vue.phoneNumber = v.phoneNumber;
                    vue.myOrderId = v.myOrderId
                    vue.dateDeliver = v.dateDeliver
                    vue.price = v.price
                    vue.quantity = v.quantity
                    vue.email = v.email;
                    vue.userId = v.userId;
                    vue.status = v.status;
                    vue.totalPriceOrders = v.totalPriceOrders;
                }
                vue.ordersLength = r.data.length;
                return vue.ordersLength;
            });
        },
        changeStatus:function(){
            const vue = this;
            vue.status = vue.status == 1 ? 2 : 1;
            var data = new FormData();
            data.append("METHOD","doUpdateInvoiceStatus");
            data.append("invoiceId", vue.userId);
            data.append("status", vue.status);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                if(r.data == 'SuccessfullyUpdateInvoiceStatus'){
                    vue.getInvoice();
                    toastr.success("Succesfully Updated");
                }
            });
        },
        changeStatusApprove:function(id){
            alert(id);
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doUpdateInvoiceStatus");
            data.append("invoiceId", id);
            data.append("status", 1);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                if(r.data == 'SuccessfullyUpdateInvoiceStatus'){
                    vue.getInvoice();
                    toastr.success("Succesfully Updated");
                }
            });
        },
        changeStatusDecline:function(id){
            alert(id);
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doUpdateInvoiceStatus");
            data.append("invoiceId", id);
            data.append("status", 2);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                if(r.data == 'SuccessfullyUpdateInvoiceStatus'){
                    vue.getInvoice();
                    toastr.success("Succesfully Updated");
                }
            });
        },
        
    },
    created:function(){     
        this.getAllOrder();     
        this.getInvoice(); 
    }
})

dashboardSide.mount('#dashboardMount');
orderSide.mount('#orderMount');
recommendationSide.mount('#recommendation');
productSide.mount('#postProduct')
customerSide.mount('#customerSide')