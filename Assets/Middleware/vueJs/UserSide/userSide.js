const { createApp } = Vue;

//From (index.php)
const product = createApp({
    data(){
        return{
            products: [],
            selectProduct: [],
            totalMyCarts: 0,
            address: [],
            productId: 0,
        }
    },
    methods:{
        doTotalMyCarts:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetMyCart");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.totalMyCarts = r.data.length;
            });
        },
        buyProduct:function(productId){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doBuyProduct");
            data.append("productId", productId);
            data.append("quantity", $('#quantity').val());
            data.append("address", $('#address').val());
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                if(r.data == "successfullyInserted"){
                    alert("Successfully Added Product!");
                    vue.getProduct();
                }else{
                    alert("Sana all");
                }
            });
        },
        addToCart:function(productId){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doAddToCart");
            data.append("productId", productId);
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                alert(r.data);
            });
        },
        getProduct:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetProduct");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.products = [];
                for(var v of r.data){
                    vue.products.push({
                        productId: v.productId,
                        productDescr: v.productDescr,
                        productName: v.productName,
                        productImage: v.productImage,
                        quantity: v.quantity,
                        category: v.category,
                        status: v.status,
                        size: v.size,
                        price: v.price,
                        dateInserted: v.dateInserted
                    })
                }
            });
        },
        getProductIds:function(productId){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getProductId");
            data.append('productId',productId);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.selectProduct = [];
                for(var v of r.data){
                    vue.productId = v.productId;
                    vue.selectProduct.push({
                        productId: v.productId,
                        productName: v.productName,
                        quantity: v.quantity,
                        category: v.category,
                        status: v.status,
                        price: v.price,
                        dateInserted: v.dateInserted
                    })
                }
            });
        },
        getProductId:function(){
            var searchParams = new URLSearchParams(window.location.search);
            var productIds = searchParams.get("productId");

            const vue = this;
            var data = new FormData();
            data.append("METHOD","getProductId");
            data.append('productId',productIds);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.selectProduct = [];
                for(var v of r.data){
                    vue.productId = v.productId;
                    vue.selectProduct.push({
                        productImage: v.productImage,
                        productId: v.productId,
                        productName: v.productName,
                        quantity: v.quantity,
                        category: v.category,
                        status: v.status,
                        price: v.price,
                        dateInserted: v.dateInserted
                    })
                }
            });
        },
        showAddreses:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","showAddress");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.address = [];
                for(var v of r.data){
                    vue.address.push({
                        addressId: v.addressId,
                        postalCode: v.postalCode,
                        city: v.city,
                        province: v.province,
                        barangay: v.barangay
                    })
                }
            });
        }
    },
    created:function(){
        this.getProduct();
        this.showAddreses();
        this.getProductId();
        this.doTotalMyCarts();
    }
})

//From (Setting.php)
const settings = createApp({
    data(){
        return{
            usersInformation: [],
            address: [],
            lengthAd: 0,
        }
    },
    methods:{
        addAddress:function(e){
            const vue = this;
            var data = new FormData();
            data.append('City', $('#City').val());
            data.append('Province',$('#Province').val());
            data.append('Street',$('#Street').val());
            data.append('PostalCode',$('#PostalCode').val());
            data.append("METHOD","doAddressId");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                if(r.data == "successfullyInserted"){
                    vue.showAddreses();
                    toastr.success("Succesfully Added Address")
                }
            });
        },
        changeProfile:function(e){
            if(confirm("Are you sure you want to change your profile picture")){
                e.preventDefault();
                var data = e.currentTarget;
                const vue = this;
                var data = new FormData(data);
                data.append("METHOD", "doChangeProfile");
                axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
                .then(function(r){
                    vue.doGetAllInformation();
                    toastr.success("Succesfully Change Profile")
                });
            }
        },
        doGetAllInformation:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD", "doGetAllInformation");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.usersInformation = [];
                for(var v of r.data){
                    vue.usersInformation.push({
                        userId: v.userId,
                        fullname: v.fullname,
                        email: v.email,
                        phoneNumber: v.phoneNumber,
                        username: v.username,
                        password: v.password,
                        role: v.role,
                        status: v.status,
                        dateCreated: v.dateCreated,
                        profileImage: v.profileImage,
                        dateUpdated: v.dateUpdated
                    })
                }
            });
        },
        showAddreses:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","showAddress");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.address = [];
                for(var v of r.data){
                    vue.address.push({
                        addressId: v.addressId,
                        postalCode: v.postalCode,
                        city: v.city,
                        province: v.province,
                        barangay: v.barangay
                    })
                }
            });
        }
    },
    created:function(){
        this.doGetAllInformation();
        this.showAddreses();
    }
})

//Mycart
const Mycart = createApp({
    data(){
        return{
            mycart: [],
            price: [],
            totalValueQuantity: 0,
            totalMyCarts: 0,
            shipping: 50,
            total: 0,
            selectProduct: [],
            address: [],
            productId: 0
        }
    },
    methods:{
        doGetMyCart:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetMyCart");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.total = parseInt(vue.totalValueQuantity) + parseInt(vue.shipping);
                vue.mycart = [];
                vue.totalMyCarts = r.data.length;
                for(var v of r.data){
                    vue.mycart.push({
                        productImage: v.productImage,
                        size: v.size,
                        productId: v.productId,
                        tblcart: v.tblcart,
                        productName: v.productName,
                        price: v.price,
                        quantity: v.quantity,
                        status: v.status
                    })
                    vue.price = v.price;
                    vue.quantity = v.quantity;
                }
            });
        },
        updateProductCart:function(productId,quantity){
            let quant = $('#'+quantity+'').val();
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doUpdateProduct");
            data.append("quantity",quant);
            data.append("productId",productId);
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                if(r.data == "UpdatedProductCart"){
                    vue.doGetMyCart();
                }else{
                    alert("WALA MA UPDATE!");
                }
            });
        },
        addUpdateProductCart:function(productId,quantity){
            let quant = $('#'+quantity+'').val();
            console.log(quant++);
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doUpdateProduct");
            data.append("quantity",quant);
            data.append("productId",productId);
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                if(r.data == "UpdatedProductCart"){
                    vue.doGetMyCart();
                }else{
                    alert("WALA MA UPDATE!");
                }
            });
        },
        sutractUpdateProductCart:function(productId,quantity){
            let quant = $('#'+quantity+'').val();
            console.log(quant--);
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doUpdateProduct");
            data.append("quantity",quant);
            data.append("productId",productId);
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                if(r.data == "UpdatedProductCart"){
                    vue.doGetMyCart();
                }else{
                    alert("WALA MA UPDATE!");
                }
            });
        },
        deleteProductCart:function(id){
            if(confirm("Are you sure you want to delete this product?")){
                const vue = this;
                var data = new FormData();
                data.append("METHOD","doDeleteCart");
                data.append("cartId",id);
                axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
                .then(function(r){
                    if(r.data == "Deleted"){
                        vue.doGetMyCart();
                    }else{
                        alert("Not Deleted!");
                    }
                });
            }
        },
        totalsCarts:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetQandP");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                for(var v of r.data){
                    vue.totalsCarts();
                    vue.totalValueQuantity = v.totalValueQuantity
                }
            });
        },
        getProductIds:function(productId){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","getProductId");
            data.append('productId',productId);
            axios.post('/finalHCI/Backend/Admin/admConnector.php',data)
            .then(function(r){
                vue.selectProduct = [];
                for(var v of r.data){
                    vue.productId = v.productId;
                    vue.selectProduct.push({
                        productId: v.productId,
                        productImage: v.productImage,
                        productName: v.productName,
                        quantity: v.quantity,
                        category: v.category,
                        status: v.status,
                        price: v.price,
                        dateInserted: v.dateInserted
                    })
                }
            });
        },
        buyProduct:function(productId){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doBuyProduct");
            data.append("productId", productId);
            data.append("address", $('#address').val());
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                if(r.data == "successfullyInserted"){
                    alert("Successfully Added Product!");
                    vue.getProduct();
                }else{
                    alert("Sana all");
                }
            });
        },
        showAddreses:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","showAddress");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.address = [];
                for(var v of r.data){
                    vue.address.push({
                        addressId: v.addressId,
                        postalCode: v.postalCode,
                        city: v.city,
                        province: v.province,
                        barangay: v.barangay
                    })
                }
            });
        }
    },
    created:function(){
        this.totalsCarts();
        this.doGetMyCart();
        this.showAddreses();
    }
})

//My Orderss
const myorder = createApp({
    data(){
        return{
            myOrders: [],
            countMyOrder: 1,
            count: 1
        }
    },
    methods:{
        doGetMyOrder:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doGetMyOrders");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                vue.myOrders = [];
                for(var v of r.data){
                    vue.myOrders.push({
                        myOrderId: v.myOrderId,
                        dateOrdered: v.dateOrdered,
                        dateDeliver: v.dateDeliver,
                        status: v.status,
                        postalCode: v.postalCode,
                        city: v.city,
                        province: v.province,
                        barangay: v.barangay,
                        productImage: v.productImage,
                        productName: v.productName,
                        quantity: v.quantity,
                        category: v.category,
                        size: v.size,
                        price: v.price
                    })
                }
            });
        },
        updateProductCart:function(productId,quantity){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doUpdateProduct");
            data.append("quantity",$('#'+quantity+'').val());
            data.append("productId",productId);
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){
                if(r.data == "UpdatedProductCart"){
                    vue.doGetMyCart();
                }else{
                    alert("WALA MA UPDATE!");
                }
            });
        },
        deleteProductCart:function(productId){
            if(confirm("Are you sure you want to delete this product?")){
                const vue = this;
                var data = new FormData();
                data.append("METHOD","doDeleteProduct");
                data.append("productId",productId);
                axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
                .then(function(r){ 
                    
                    if(r.data == "DeletedProductCart"){
                        vue.doGetMyCart();
                    }else{
                        alert("WALA MA UPDATE!");
                    }
                });
            }
        },
        doCountAllMyOrder:function(){
            const vue = this;
            var data = new FormData();
            data.append("METHOD","doCountAllMyOrder");
            axios.post('/finalHCI/Backend/Customer/cusConnector.php',data)
            .then(function(r){ 
                for(var v of r.data){
                    vue.countMyOrder = v.countedOrder;
                }
            });
        }
    },
    created:function(){
        this.doGetMyOrder();
        this.doCountAllMyOrder();
    }
})

Mycart.mount('#customerMyCart')
product.mount('#customerLandingPage')
settings.mount('#settingsApp')
myorder.mount('#myOrders');