$(function () {
    // localStorage.clear();
    cartDetails();
    cartPageDetails();
    checkoutPageDetails();
    $(".btn-cart").click(function () {
        let productId = $(this).attr("cus-product-id");
        // console.log(productId);
        let productName = $(this).attr("cus-product-name");
        let productSlug = $(this).attr("cus-product-slug");
        let cusPrice = $(this).attr("cus-price");
        // alert(cusPrice);
        let productSize = $(this).attr("cus-size");
        let productSizeId = $(this).attr("cus-sizeID");
        let isSize = $('#sizeId').val();
        // alert(productSizeId);
        let productStock = $(this).attr("cus-stock");
        let cusPhoto = $(this).attr("cus-photo");
        //let selectedSize= document.getElementById('size');
        //let productSize = selectedSize.value;
        //alert(productSize);
        // var productSizeLabel = selectedSize.options[selectedSize.selectedIndex].dataset.size;

        // let productMaxQty = parseFloat($('#qty').attr('max'));
        let productMaxQty = productStock;

        //let cusQtyNo = parseFloat($('#quantity').val());

        let product = {
            productId: productId,
            productName: productName,
            productSlug: productSlug,
            cusPrice: cusPrice,
            cusPhoto: cusPhoto,
            productSize: productSize,
            productSizeId: productSizeId,
            productStock: productStock,
            productMaxQty: productMaxQty,
            cusQty: 1,
        };

        productStockCart = productCartStock(product);

        // alert(productStockCart)

        if (!productSize && isSize) {
            // alert('Please select color and size first')
            $("#sizeColorSelectError").find("span").html("");
            // $('#sizeColorSelectError').find("span").append('<span>Please Select Size first</span>');
            Swal.fire({
                position: "bottom-center",
                icon: "info",
                title: "Please Select Size",
                text: "",
                toast: true,
                iconColor: "red",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: "#ffffff",
                customClass: {
                    popup: "bottom-center-toast",
                },
            });
        } else if (productStock < productStockCart + 1) {
            // alert('Minimum Order Quantity 1');
            Swal.fire({
                position: "bottom-center",
                icon: "warning",
                title: "Only 1 item(s) are available for Size: " + productSize,
                text: "",
                toast: true,
                iconColor: "green",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: "#ffffff",
                customClass: {
                    popup: "bottom-center-toast",
                },
            });
        }
        // else if (cusQtyNo > productMaxQty) {
        //     alert('Max Quantity '+productMaxQty)
        // }
        else {
            // let product = {
            //     'productId':productId,
            //     'productName':productName,
            //     'productSlug':productSlug,
            //     'cusPrice':cusPrice,
            //     'cusPhoto':cusPhoto,
            //     'productSize':productSize,
            //     'productStock':productStock,
            //     'productMaxQty':productMaxQty,
            //     'cusQty':cusQtyNo,
            // };

            let cart = [];
            if (localStorage.getItem("cart") === null) {
            } else {
                cart = JSON.parse(localStorage.getItem("cart"));
            }

            let index = checkCart(product);

            if (index == -1) {
                addToCart(cart, product);
            } else {
                updateCart(product, index, 1);
            }
            $(".sizeColorSelectError").hide();
            cartDetails();
        }
    });

    function addToCart(cart, product) {
        cart.push(product);
        localStorage.setItem("cart", JSON.stringify(cart));
        // alert('Product Successfully added into Cart')
        Swal.fire({
            position: "bottom-center",
            icon: "success",
            title: "Product added to cart",
            text: "",
            toast: true,
            iconColor: "green",
            showConfirmButton: false,
            showCloseButton: true,
            timer: 4000,
            timerProgressBar: true,
            background: "#ffffff",
            customClass: {
                popup: "bottom-center-toast",
            },
        });
    }

    function updateCart(product, index, cusQtyNo) {
        let cart = JSON.parse(localStorage.getItem("cart"));

        cart[index].cusQty = cart[index].cusQty + 1;
        localStorage.setItem("cart", JSON.stringify(cart));
        // cart[index].cusQty += cusQtyNo;
        // alert('Product Already in Cart')
        Swal.fire({
            position: "bottom-center",
            icon: "success",
            title: "Cart Updated",
            text: "",
            toast: true,
            iconColor: "green",
            showConfirmButton: false,
            showCloseButton: true,
            timer: 4000,
            timerProgressBar: true,
            background: "#ffffff",
            customClass: {
                popup: "bottom-center-toast",
            },
        });
    }

    function updateCartWithVariable(product, index, cusQtyNo) {
        let cart = JSON.parse(localStorage.getItem("cart"));

        cart[index].cusQty = cusQtyNo;
        localStorage.setItem("cart", JSON.stringify(cart));

        // cart[index].cusQty += cusQtyNo;

        alert("Product Already in Cart");
    }

    function cartDetails() {
        let totalPrice = 0;
        let totalSubtotal = 0;
        let cartContent = "";

        if (localStorage.getItem("cart") === null) {
            $(".cart-count").html(0);
            $(".no-items").show();
            $(".has-items").hide();
        } else {
            let cartData = JSON.parse(localStorage.getItem("cart"));

            $(".cart-count").html(cartData.length);
            let cartNo = 0;
            cartData.forEach(function (data) {
                cartContent +=
                    '<li>'+
                    '<a href="'+data.productSlug+'" class="sidekka_pro_img">'+
                    '<img src="'+data.cusPhoto+'" alt="product"></a>'+
                    '<div class="ec-pro-content">'+
                        '<a href="'+data.productSlug+'" class="cart_pro_title">'+data.productName+'</a>'+
                        '<span class="cart-price"><span>Tk '+Number(data.cusPrice).toFixed(2)+'</span> x'+ data.cusQty+'</span>'+
                        '<a href="#" class="btn-remove remove" cus-product-id="' +
                        data.productId +
                        '" cart_item_no="' +
                        cartNo +
                        '">X</a>'+
                    '</div>'+
                "</li>";

                totalSubtotal += data.cusPrice * data.cusQty;
                totalPrice += data.cusPrice * data.cusQty;
                cartNo += 1;
            });

            $(".has-items").show();
            $(".no-items").hide();
            $(".eccart-pro-items").html(cartContent);
            $(".cart-total-price").html("Tk " + totalPrice.toFixed(2));
            $(".cart-subtotal-price").html("Tk " + totalSubtotal.toFixed(2));
            localStorage.setItem("totalPrice", JSON.stringify(totalPrice));
        }
    }

    function cartPageDetails() {
        let totalSubtotal = 0;
        let totalPrice = 0;
        let cartContent = "";
        let cartNoContent = "";

        if (localStorage.getItem("cart") === null) {
            $(".cart-count").html(0);
        } else {
            let cartData = JSON.parse(localStorage.getItem("cart"));
            $(".cart-count").html(cartData.length);
            let cartNo = 0;
            cartData.forEach(function (data) {
                if (data.productSize) {
                    cartContent +=
                    // "<tr>" +
                    // '<td className="product_thumb"><a href="' +
                    // data.productSlug +
                    // '">' +
                    // '<img src="' +
                    // data.cusPhoto +
                    // '" alt="' +
                    // data.productName +
                    // '" style="width: 100px; height: 100px;"></a></td>' +
                    // '<td className="product_name"><a href="' +
                    // data.productSlug +
                    // ' ">' +
                    // data.productName +
                    // "</a></td>" +
                    // '<td className="product_name">' +
                    // data.productSize +
                    // "</td>" +
                    // '<td className="product-price">Tk ' +
                    // Number(data.cusPrice).toFixed(2) +
                    // "</td>" +
                    // '<td className="product_quantity"><label></label> <input style="width: 80px;" class="qtyCart" id="qtyCart' +
                    // cartNo +
                    // '" cus-product-id="' +
                    // data.productId +
                    // '" cart_item_no="' +
                    // cartNo +
                    // '" min="1" max="' +
                    // data.productMaxQty +
                    // '" value="' +
                    // data.cusQty +
                    // '" type="number">' +
                    // '<a href="#" class="btn-remove ec-cart-pro-remove" cus-product-id="' +
                    // data.productId +
                    // '" cart_item_no="' +
                    // cartNo +
                    // '">' +
                    // '<i class="fa fa-times" style="color: #FFFFFF; margin-left: 10px;padding: 10px; background-color: red;"></i></a>' +
                    // "</td>" +
                    // '<td className="product_total">Tk ' +
                    // Number(data.cusPrice * data.cusQty).toFixed(2) +
                    // "</td>" +
                    // " </tr>" +
                    // " </td>" +
                    // "</tr>";
                    '<tr>'+
                        '<td data-label="Product" class="ec-cart-pro-name">'+
                            '<a href="'+data.productSlug+'">'+
                                '<img class="ec-cart-pro-img mr-4"'+
                                    'src="'+data.cusPhoto+'" alt="" />'+data.productName +
                            '</a>'+
                        '</td>'+
                        '<td>'+data.productSize+'</td>'+
                        '<td data-label="Price" class="ec-cart-pro-price">'+
                            '<span class="amount">৳'+ Number(data.cusPrice).toFixed(2)+'</span>'+
                        '</td>'+
                        '<td data-label="Quantity" class="ec-cart-pro-qty" style="text-align: center;">'+
                            '<div class="cart-qty-plus-minus">'+
                                '<input style="width: 80px;" class="cart-plus-minus qtyCart" id="qtyCart' +
                                    cartNo +
                                '" cus-product-id="' +
                                data.productId +
                                '" cart_item_no="' +
                                cartNo +
                                '" min="1" max="' +
                                data.productMaxQty +
                                '" value="' +
                                data.cusQty +
                                '" type="number">' +
                                '<a href="#" class="btn-remove" cus-product-id="' +
                                data.productId +
                                '" cart_item_no="' +
                                cartNo +
                                '">' +
                            '</div>'+
                        '</td>'+
                        '<td data-label="Total" class="ec-cart-pro-subtotal">৳'+Number(data.cusPrice * data.cusQty).toFixed(2)+'</td>'+
                        '<td data-label="Remove" class="ec-cart-pro-remove">'+
                            '<a href="#" class="btn-remove" cus-product-id="' +
                        data.productId +
                        '" cart_item_no="' +
                        cartNo +'"><i class="ecicon eci-trash-o"></i></a>'+
                        '</td>'+
                    '</tr>';
                }
                else{
                    cartContent +=
                    // "<tr>" +
                    // '<td className="product_thumb"><a href="' +
                    // data.productSlug +
                    // '">' +
                    // '<img src="' +
                    // data.cusPhoto +
                    // '" alt="' +
                    // data.productName +
                    // '" style="width: 100px; height: 100px;"></a></td>' +
                    // '<td className="product_name"><a href="' +
                    // data.productSlug +
                    // ' ">' +
                    // data.productName +
                    // "</a></td>" +
                    // '<td className="product_name">' +
                    // 'N/A'+
                    // "</td>" +
                    // '<td className="product-price">Tk ' +
                    // Number(data.cusPrice).toFixed(2) +
                    // "</td>" +
                    // '<td className="product_quantity"><label></label> <input style="width: 80px;" class="qtyCart" id="qtyCart' +
                    // cartNo +
                    // '" cus-product-id="' +
                    // data.productId +
                    // '" cart_item_no="' +
                    // cartNo +
                    // '" min="1" max="' +
                    // data.productMaxQty +
                    // '" value="' +
                    // data.cusQty +
                    // '" type="number">' +
                    // '<a href="#" class="btn-remove" cus-product-id="' +
                    // data.productId +
                    // '" cart_item_no="' +
                    // cartNo +
                    // '">' +
                    // '<i class="fa fa-times" style="color: #FFFFFF; margin-left: 10px;padding: 10px; background-color: red;"></i></a>' +
                    // // '<button type="button" class="btn btn-remove"><i class="fa fa-times"></i></button>' +
                    // "</td>" +
                    // '<td className="product_total">Tk ' +
                    // Number(data.cusPrice * data.cusQty).toFixed(2) +
                    // "</td>" +
                    // " </tr>" +
                    // " </td>" +
                    // "</tr>";
                    '<tr>'+
                        '<td data-label="Product" class="ec-cart-pro-name">'+
                            '<a href="'+data.productSlug+'">'+
                                '<img class="ec-cart-pro-img mr-4"'+
                                    'src="'+data.cusPhoto+'" alt="" />'+data.productName +
                            '</a>'+
                        '</td>'+
                        '<td>N/A</td>'+
                        '<td data-label="Price" class="ec-cart-pro-price">'+
                            '<span class="amount">৳'+ Number(data.cusPrice).toFixed(2)+'</span>'+
                        '</td>'+
                        '<td data-label="Quantity" class="ec-cart-pro-qty" style="text-align: center;">'+
                            '<div class="cart-qty-plus-minus">'+
                                '<input style="width: 80px;" class="cart-plus-minus qtyCart" id="qtyCart' +
                                    cartNo +
                                '" cus-product-id="' +
                                data.productId +
                                '" cart_item_no="' +
                                cartNo +
                                '" min="1" max="' +
                                data.productMaxQty +
                                '" value="' +
                                data.cusQty +
                                '" type="number">' +
                                '<a href="#" class="btn-remove" cus-product-id="' +
                                data.productId +
                                '" cart_item_no="' +
                                cartNo +
                                '">' +
                            '</div>'+
                        '</td>'+
                        '<td data-label="Total" class="ec-cart-pro-subtotal">৳'+Number(data.cusPrice * data.cusQty).toFixed(2)+'</td>'+
                        '<td data-label="Remove" class="ec-cart-pro-remove">'+
                            '<a href="#" class="btn-remove" cus-product-id="' +
                        data.productId +
                        '" cart_item_no="' +
                        cartNo +'"><i class="ecicon eci-trash-o"></i></a>'+
                        '</td>'+
                    '</tr>';
                }

                totalSubtotal += data.cusPrice * data.cusQty;
                totalPrice += data.cusPrice * data.cusQty;
                cartNo += 1;
            });

            // cartNoContent += '' +
            //     '<div class="row">' +
            //         '<div class="col-md-12 text-center">' +
            //             '<h2>Your cart is empty !</h2>' +
            //             '<h5 class="mt-3">Add Items to it now.</h5>' +
            //             '<a href="/shop" class="btn btn-warning mt-5">Shop Now</a>' +
            //         '</div>' +
            //     '</div>';
        }
        if (localStorage.getItem("cart") === null) {
            $(".cartDataDiv").hide();
            $(".cartEmptyDiv").show();
        } else {
            $(".cartDataDiv").show();
            $(".cartEmptyDiv").hide();
            $(".cart-page-view").html(cartContent);
            $(".checkout-page-view").html(cartContent);
            $(".cart-subtotal-price").html("Tk " + totalSubtotal.toFixed(2));
            $(".cart-total-price").html("Tk " + totalPrice.toFixed(2));
            $(".cart-new-subtotal-price").html("Tk " + totalPrice.toFixed(2));
        }
    }

    function checkoutPageDetails() {
        let totalSubtotal = 0;
        let totalPrice = 0;
        let cartContent = "";

        if (localStorage.getItem("cart") === null) {
            $(".cart-count").html(0);
        } else {
            let cartData = JSON.parse(localStorage.getItem("cart"));

            $(".cart-count").html(cartData.length);
            let cartNo = 0;
            cartData.forEach(function (data) {
                if (data.productSize) {
                    cartContent +=
                    "<tr> " +
                    "<td>" +
                    '<a href="' +
                    data.productSlug +
                    '">' +
                    data.productName +
                    " (Size: " +
                    data.productSize +
                    " )" +
                    " X " +
                    data.cusQty +
                    "</a> " +
                    "</td>" +
                    "<td>Tk " +
                    data.cusQty * data.cusPrice +
                    "</td>" +
                    "</tr>";
                }
                else
                {
                    cartContent +=
                    "<tr> " +
                    "<td>" +
                    '<a href="' +
                    data.productSlug +
                    '">' +
                    data.productName +

                    " X " +
                    data.cusQty +
                    "</a> " +
                    "</td>" +
                    "<td>Tk " +
                    data.cusQty * data.cusPrice +
                    "</td>" +
                    "</tr>";
                }

                totalSubtotal += data.cusPrice * data.cusQty;
                totalPrice += data.cusPrice * data.cusQty;
                cartNo += 1;
            });
        }
        $(".checkout-page-view").html(cartContent);
        $(".cart-subtotal-price").html("Tk " + totalSubtotal.toFixed(2));
        $(".cart-total-price").html("Tk " + totalPrice.toFixed(2));
        $(".cart-new-subtotal-price").html("Tk " + totalPrice.toFixed(2));
    }

    function checkoutSuccessPageDetails() {
        let afterCheckoutContent = "";
        let checkoutError = localStorage.getItem("checkoutError");

        if (checkoutError == 1) {
            afterCheckoutContent +=
                '<h2 class="checkout-title" style="text-align: center">Something went wrong, try again please...</h2>' +
                '<h2 class="checkout-title" style="text-align: center">You may <a style="color: blue" href="/user_login">Login</a> for another update </h2>';
        } else {
            afterCheckoutContent +=
                '<h2 class="checkout-title" style="text-align: center">Congratulation You have place an Order Successfully.</h2>' +
                '<h2 class="checkout-title" style="text-align: center"> <a href="/my_account" style="color: red;">Go My Account </a> for order update </h2>';
        }

        $(".checkout-success").html(afterCheckoutContent);
    }

    function checkCart(product) {
        let res = -1;
        if (localStorage.getItem("cart") === null) {
            return -1;
        } else {
            let isVariable = 1; // has product variation or not
            let cartData = JSON.parse(localStorage.getItem("cart"));
            let i;
            for (i = 0; i < cartData.length; i++) {
                if (isVariable == 1) {
                    if (
                        cartData[i].productId == product.productId &&
                        cartData[i].productSize == product.productSize
                    ) {
                        res = i;
                        break;
                    }
                } else {
                    if (cartData[i].productId == product.productId) {
                        res = i;
                        break;
                    }
                }
            }
        }
        return res;
    }

    function productCartStock(product) {
        let res = 0;
        if (localStorage.getItem("cart") === null) {
            return 0;
        } else {
            let isVariable = 1; // has product variation or not
            let cartData = JSON.parse(localStorage.getItem("cart"));
            let i;
            for (i = 0; i < cartData.length; i++) {
                if (isVariable == 1) {
                    if (
                        cartData[i].productId == product.productId &&
                        cartData[i].productSize == product.productSize
                    ) {
                        res = cartData[i].cusQty;
                        break;
                    }
                } else {
                    if (cartData[i].productId == product.productId) {
                        res = cartData[i].cusQty;
                        break;
                    }
                }
            }
        }
        return res;
    }

    function checkCartItems() {
        if (localStorage.getItem("cart") === null) {
            return false;
        } else {
            return true;
        }
    }

    $(".orderPlaceBtn").click(function () {
        // if (checkCartItems()){
            // console.log('d');
        let cartData = JSON.parse(localStorage.getItem("cart"));
        if (cartData == null) {
            alert("Product add to cart first");
        } else {
            let url = $(this).attr("cus-url");
            let name = $("#name").val();
            let phone = $("#phone").val();
            let email = $("#email").val();
            let address = $("#address").val();
            let district = $("#district").val();
            // alert(district);
            // let order_note = $('#order_note').val()
            let totalPrice = JSON.parse(localStorage.getItem("totalPrice"));
            let totalDiscount = JSON.parse(
                localStorage.getItem("totalDiscount")
            );
            let shippingCharge = JSON.parse(
                localStorage.getItem("shippingCharge")
            );

            if (
                name !== "" &&
                phone !== "" &&
                address !== "" &&
                district !== "" && district !== "--Select District--"
            ) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: url,
                    data: {
                        cartData,
                        name,
                        phone,
                        address,
                        email,
                        district,
                        totalPrice,
                        totalDiscount,
                        shippingCharge,
                    },
                    type: "post",
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            localStorage.clear();
                            cartDetails();
                            checkoutPageDetails();
                            $(".summary").hide();
                            $(".orderPlaceBtn").hide();
                            $(".afterCheckout").hide();
                            $(".ec-checkout-wrap").hide();
                            $(".ec-check-order-btn").hide();
                            $(".ec-checkout-rightside").hide();
                            if (data.response == false) {
                                localStorage.setItem("checkoutError", 1);
                            }
                            checkoutSuccessPageDetails();
                        } else {
                            $(".print-error-msg").find("ul").html("");
                            $(".print-error-msg").css("display", "block");
                            $.each(data.error, function (key, value) {
                                $(".print-error-msg")
                                    .find("ul")
                                    .append("<li>" + value + "</li>");
                            });
                        }
                    },
                    failed: function () {
                        alert("Something went wrong, Please try again");
                    },
                });
            } else {
                alert("Name, Phone, Shipping Address, District required");
            }
        }
    });

    $(document).on("click", ".btn-remove", function () {
        let productId = $(this).attr("cus-product-id");
        let cartItemNo = $(this).attr("cart_item_no");
        console.log(productId);
        let cart = JSON.parse(localStorage.getItem("cart"));
        if (productId == cart[cartItemNo].productId) {
            cart.splice(cartItemNo, 1);
            Swal.fire({
                position: "bottom-center",
                icon: "warning",
                title: "Product removed to cart",
                text: "",
                toast: true,
                iconColor: "red",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: "#ffffff",
                customClass: {
                    popup: "bottom-center-toast red-timer-class",
                },
            });
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        cartDetails();
        cartPageDetails();
    });

    $(document).on("click", ".btn-clear", function () {
        localStorage.removeItem("cart");
        cartDetails();
        cartPageDetails();
        checkoutPageDetails();
    });

    $(document).on("input", ".qtyCart", function () {
        let productId = $(this).attr("cus-product-id");
        let cartItemNo = $(this).attr("cart_item_no");
        // console.log(cartItemNo);
        let qtyCart = parseFloat($("#qtyCart" + cartItemNo).val());
        // console.log(qtyCart);
        let maxAdd = $(this).attr("max");
        // console.log(maxAdd);

        if (qtyCart == 1) {
            let cart = JSON.parse(localStorage.getItem("cart"));
            // cart[index].cusQty += cusQtyNo;
            cart[cartItemNo].cusQty = qtyCart;
            localStorage.setItem("cart", JSON.stringify(cart));
            Swal.fire({
                position: "bottom-center",
                icon: "warning",
                title: "Quantity can not be less than 1",
                text: "",
                toast: true,
                iconColor: "red",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: "#ffffff",
                customClass: {
                    popup: "bottom-center-toast red-timer-class",
                },
            });
        } else if (qtyCart == 0 || qtyCart == null) {
            // alert('Min Quantity 1')
            Swal.fire({
                position: "bottom-center",
                icon: "warning",
                title: "Quantity can not be less than 1",
                text: "",
                toast: true,
                iconColor: "green",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: "#ffffff",
                customClass: {
                    popup: "bottom-center-toast",
                },
            });
            cart[cartItemNo].cusQty = 1;
            localStorage.setItem("cart", JSON.stringify(cart));
        } else if (qtyCart >= maxAdd) {
            Swal.fire({
                position: "bottom-center",
                icon: "warning",
                title: "Product Not Available in Stock",
                text: "",
                toast: true,
                iconColor: "red",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: "#ffffff",
                customClass: {
                    popup: "bottom-center-toast red-timer-class",
                },
            });
        } else {
            let cart = JSON.parse(localStorage.getItem("cart"));
            // cart[index].cusQty += cusQtyNo;
            cart[cartItemNo].cusQty = qtyCart;
            localStorage.setItem("cart", JSON.stringify(cart));

            // if(productId == cart[cartItemNo].productId){
            //     cart.splice(cartItemNo,1);
            // }
            // localStorage.setItem('cart',JSON.stringify(cart));
            Swal.fire({
                position: "bottom-center",
                icon: "success",
                title: "Cart Updated",
                text: "",
                toast: true,
                iconColor: "green",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                background: "#ffffff",
                customClass: {
                    popup: "bottom-center-toast",
                },
            });
            cartDetails();
            cartPageDetails();
        }
    });
});

$('select[name="sizeList"]').on("change", function () {
    var color = $("option:selected", this).attr("color");
    var size = $("option:selected", this).attr("value");
    var qty = $("option:selected", this).attr("qty");

    $("#qty").attr("max", qty);
    $("#qty").attr("value", 1);

    if (color !== "" && size !== "") {
        $("#btn-cart").attr("cus-color", color);
        $("#btn-cart").attr("cus-size", size);
        $("#btn-cart").attr("cus-maxqty", qty);
    }
});

$('select[name="size"]').on("change", function () {
    $("#sizeColorSelectError").hide();
});

$(".sizeClick").click(function () {
    size = $(this).data("size");
    variationID = $(this).attr("variationID");
    // alert(variationID);
    stock = $(this).data("stock");

    $(".product_details_nav_item a").removeClass("active");
    $(this).addClass("active");
    $("#sizeColorSelectError").hide();
    $("#btn-cart").prop("disabled", false);
    $("#btn-cart").attr("cus-size", size);
    $("#btn-cart").attr("cus-sizeID", variationID);
    $("#btn-cart").attr("cus-stock", stock);

    if (stock == 0) {
        Swal.fire({
            position: "bottom-center",
            icon: "warning",
            title: "Out of Stock",
            text: "",
            toast: true,
            iconColor: "green",
            showConfirmButton: false,
            showCloseButton: true,
            timer: 4000,
            timerProgressBar: true,
            background: "#ffffff",
            customClass: {
                popup: "bottom-center-toast",
            },
        });
        $("#btn-cart").prop("disabled", true);
    } else if (stock <= 3) {
        $("#sizeColorSelectError").show();
        $("#sizeColorSelectError").find("span").html("");
        $("#sizeColorSelectError")
            .find("span")
            .append("<span>Low Stock</span>");
        $("#btn-cart").prop("disabled", false);
    }
});

$(".quickViewDetailsByPId").click(function () {
    let productId = $(this).attr("quick-product");
    let url = $(this).attr("quick-url");
    let productUrl = $(this).attr("product-url");
    let quickAsset = $(this).attr("quick-asset");
    // console.log(quickAsset)
    $.ajax({
        url: url,
        data: { productId },
        type: "post",
        success: function (data) {
            if ($.isEmptyObject(data.error)) {
                $("#qvTitle").find("span").html("");
                $("#qvTitle")
                    .find("span")
                    .append("" + capitalizeWord(data.title) + "");

                $("#qvNewPrice").find("span").html("");
                $("#qvNewPrice")
                    .find("span")
                    .append("Tk " + Number(data.mrp).toFixed(2) + "");

                $("#qvCat").find("span").html("");
                if (data.category) {
                    $("#qvCat")
                        .find("span")
                        .append(
                            "<p><strong>Category</strong>: " +
                                data.category.name +
                                "</p>"
                        );
                }
                $("#qvColor").find("span").html("");
                if (data.color) {
                    $("#qvColor")
                        .find("span")
                        .append(
                            "<p><strong>Color</strong>: " + data.color + "</p>"
                        );
                }

                $("#qvDetails").find("span").html("");
                if (data.description) {
                    $("#qvDetails")
                        .find("span")
                        .append(
                            "" + capitalizeFirstLetter(data.description) + ""
                        );
                }

                $("#qvUrl").find("a").html("");
                // $('#qvUrl').find("a").append('product-details/' + data.id + '');
                $("#qvUrl")
                    .find("a")
                    .append(
                        '<a href="' +
                            productUrl +
                            '" style="color: #fff">add to cart</a>'
                    );

                $("#qvImg").find("a").html("");
                $("#qvImg")
                    .find("a")
                    .append(
                        '<img src="' +
                            quickAsset +
                            "/images/product_image/" +
                            data.image +
                            '">'
                    );
            }
        },
    });
});
function capitalizeFirstLetter(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}
function capitalizeWord(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
}
