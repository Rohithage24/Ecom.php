$(document).ready(function() {
    $(".filter-btn").click(function() {
        var filterValue = $(this).attr("data-filter");

        if (filterValue == "all") {
            $(".product-item").show();
        } else {
            $(".product-item").not("[data-category='" + filterValue + "']").hide();
            $(".product-item[data-category='" + filterValue + "']").show();
        }

        $(".filter-btn").removeClass("btn-primary").addClass("btn-secondary");
        $(this).removeClass("btn-secondary").addClass("btn-primary");
    });

   // naveber


    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }


    // produvt

    let stock = 10;

   
    $("#increment").click(function() {
        let quantity = parseInt($("#quantity").val());
        if (quantity < stock) {
            $("#quantity").val(quantity + 1);
        }
    });

    $("#decrement").click(function() {
        let quantity = parseInt($("#quantity").val());
        if (quantity > 1) {
            $("#quantity").val(quantity - 1);
        }
    });




    // checkout start

    document.getElementById('debit_card').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);
});

document.getElementById('cvv').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 3);
});

    // checkout end
});
