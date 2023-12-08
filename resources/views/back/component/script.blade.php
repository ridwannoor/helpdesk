<!--begin::Global Theme Bundle -->
<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/snippets/custom/pages/user/login.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="{{ asset('assets/demo/default/custom/crud/wizard/wizard.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>            
<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/components/charts/flotcharts.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/flot/flot.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/components/charts/morris-charts.js')}}" type="text/javascript"></script>

@yield('footer-script')

<script type="text/javascript">

$(document).ready(function(){
 
    $('#m_table_1_wrapper').DataTable( {
    responsive: true
    } );

    $("#confrm").click(function(){ 
        var fnama = $("#contactperson").val();
        var lalamat = $("#email").val();
        
        if( contactperson != '' || email !='' ){
            return true; 
        }	
        else{
            alert("Tolong diisi...!!!!!!");
            return false;
        }
    });
});
</script>

<script type="text/javascript">
        function ShowHideDiskon(chkDiskon) {
            var dvPassport = document.getElementById("diskon");            
            dvPassport.style.display = chkDiskon.checked ? "block" : "none";            
        }
        function ShowHidePpn(chkPpn) {
            var dvPpn = document.getElementById("ppn");            
            dvPpn.style.display = chkPpn.checked ? "block" : "none";            
        }
        function ShowHidePph(chkPph) {
            var dvPph = document.getElementById("pph");            
            dvPph.style.display = chkPph.checked ? "block" : "none";            
        }
</script>

<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // $('#qtyakhir').keyup(function){
        //     var qtyawal = parseInt($('qtyawal').val());
        //     var qtyakhir = parseInt($('qtyakhir').val());
        //     var has = qtyakhir <= qtyawal ;
        // $('#qtyakhir').val(has);
        // });

        $('#qtyakhir').keyup(function(){
            var qtyawal = parseInt($('qtyawal').val());
        if ($(this).val() > qtyawal){
            alert("Maksimal Batas");
        $(this).val();
        }
        });

        $('#dpp').keyup(function(){
        var bayar=parseInt($('#dpp').val());
        // var ppn=parseInt($('#ppn').val());
        // var pph=parseInt($('#pph').val());
        var subtotal_bayar = bayar ;
        // var ppn =  subtotal_bayar * 0.1 ;
        // var pph =  subtotal_bayar * 0.3 ;        
        // var total = subtotal_bayar + ppn + pph ;
        var total = subtotal_bayar ;
        $('#subtotal').val(subtotal_bayar);
        // $('#ppn').val(ppn);
        // $('#pph').val(pph);
        $('#total').val(total);
        });

        $('#diskon').keyup(function(){
            var diskon=parseInt($('#diskon').val());
            var bayar=parseInt($('#dpp').val());
            var subtotal_bayar = bayar-(diskon/100)*bayar;
            var total_bayar = subtotal_bayar;
            
        $('#subtotal').val(subtotal_bayar);
        $('#total').val(total_bayar);
        });

        $('#ppn').keyup(function(){
            var ppn=parseInt($('#ppn').val());
            var subtotal_bayar=parseInt($('#subtotal').val());
            // var subtotal_bayar = bayar-(diskon/100)*bayar;
            var total_bayar = subtotal_bayar*(ppn/100)+subtotal_bayar;
            
        // $('#subtotal').val(subtotal_bayar);
        $('#total').val(total_bayar);
        });

        $('#pph').keyup(function(){
            var pph=parseInt($('#pph').val());
            var subtotal_bayar=parseInt($('#subtotal').val());
            // var subtotal_bayar = bayar-(diskon/100)*bayar;
            var total_bayar = subtotal_bayar*(pph/100)+subtotal_bayar;
            
        // $('#subtotal').val(subtotal_bayar);
        $('#total').val(total_bayar);
        });

        $('#biayakirim').keyup(function(){
            // var subtotal_bayar=parseInt($('#subtotal').val());
            var kirim=parseInt($('#biayakirim').val());
            var subtotal=parseInt($('#subtotal').val());
            // var diskon=parseInt($('#diskon').val());
            // var subtotal_bayar = 
            // var total=parseInt($('#total').val());
            var total = kirim + subtotal; 
            
        $('#total').val(total);
        });

    });
</script>

<script type="text/javascript"> 
        
    $(document).ready(function(){

    // For select all checkbox in table
    $('#checkedAll').click(function (e) {
        //e.preventDefault();
        $(this).closest('#tblAddRow').find('td input:checkbox').prop('checked', this.checked);
    });

    // Add row the table
    $('#btnAddRow').on('click', function() {
        var lastRow = $('#tblAddRow tbody tr:last').html();
        //alert(lastRow);
        $('#tblAddRow tbody').append('<tr>' + lastRow + '</tr>');
        $('#tblAddRow tbody tr:last input').val('');
    });

    // Delete last row in the table
    $('#btnDelLastRow').on('click', function() {
        var lenRow = $('#tblAddRow tbody tr').length;
        //alert(lenRow);
        if (lenRow == 1 || lenRow <= 1) {
            alert("Can't remove all row!");
        } else {
            $('#tblAddRow tbody tr:last').remove();
        }
    });

    // Delete row on click in the table
    $('#tblAddRow').on('click', 'tr a', function(e) {
        var lenRow = $('#tblAddRow tbody tr').length;
        e.preventDefault();
        if (lenRow == 1 || lenRow <= 1) {
            alert("Can't remove all row!");
        } else {
            $(this).parents('tr').remove();
        }
    });

    // Delete selected checkbox in the table
    $('#btnDelCheckRow').click(function() {
        var lenRow		= $('#tblAddRow tbody tr').length;
        var lenChecked	= $("#tblAddRow input[type='checkbox']:checked").length;
        var row	= $("#tblAddRow tbody input[type='checkbox']:checked").parent().parent();
        //alert(lenRow + ' - ' + lenChecked);
        if (lenRow == 1 || lenRow <= 1 || lenChecked >= lenRow) {
            alert("Can't remove all row!");
        } else {
            row.remove();
        }
});

// $('#delrow').click(function(){
//     var id = $(this).data("id");
//     var token = $("meta[name='csrf-token']").attr("content");
   
//     $.ajax(
//     {
//         url: "do/deleterow"+"/"+id,
//         type: 'GET',
//         data: {
//             "id": id,
//             "_token": token,
//         },
//         success: function (){
//             console.log("it Works");
//         }
//     });

// });

                
});

    </script>
