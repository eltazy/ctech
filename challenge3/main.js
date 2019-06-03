// AJAX call for autofilling rooms
$(document).ready(function () {
    $('select').on('change', function() {
        var event_id = event.target.id.substring(8);
        if(event.target.id.substring(0, 8)=="building"){
            var room_list = document.getElementById('rooms'+event_id);
            room_list.innerHTML="";
            var building_list = document.getElementById(event.target.id);
            var xbuild_id = building_list.options[building_list.selectedIndex].value;
            $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "xfill-rooms.php",
                    data: { 'xbuild_id': xbuild_id },
                    success: function(data){
                        data.forEach(function(opt){
                            var option=document.createElement('option');
                            option.value=opt.room_id;
                            option.innerHTML=opt.room_name;
                            room_list.appendChild(option);
                        });
                    }
            });
        }
    });
});
