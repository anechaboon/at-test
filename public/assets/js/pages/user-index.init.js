
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });
    // $('#datatable').DataTable();
    // $('#datatable').DataTable( {
    //     paging: false,
    //     searching: false,
    //     ordering: true,
    //     columnDefs: [{
    //         orderable: false,
    //         targets: "no-sort"
    //     }]
    // } );


    $('#search').keyup(function(){
        searchUsers()
    });

    $('.fa-sort-up').click(function(){
        
        $(this).toggleClass("fa-sort-up");
        if($(this).hasClass("fa-sort-up")){
            searchUsers('ASC')
        }
    });

    $('.fa-sort-down').click(function(){
        if(!$(this).hasClass("fa-sort-up")){
            searchUsers('DESC')
        }
    });

    function searchUsers(order='ASC'){
        let search = $('#search').val();
        console.log('search',search);
        $.ajax({ 
            type: 'POST', 
            url: searchUser, 
            data: {
                "search": search,
                "order":order
            }, 
            dataType: 'json',
            success: function(response) {
                if(response.data != null){
                    $('tbody').html('')
                    $.each(response.data, function (key, val) {
                        let age = getAge(val.birthdate);
                        let social = val.social_media.replaceAll(",", " ");
                        
                        $('tbody').append(
                            `<tr>
                                <td>${val.name} ${val.lastname}</td>
                                <td>${age}</td>
                                <td>${val.email}</td>
                                <td>${val.gender}</td>
                                <td>${social}</td>
                                <td><img src="assets/images/users/${val.image}" alt="Girl in a jacket" width="60" height="70"></td>
                            </tr>`
                        );
                    });

                }else{
                    $('tbody').html('<tr><td colspan="6">Not Found</td></tr>')
                }
            },
            error: function(Data){
                alert("fdd");
            }
        });
    }

    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
});