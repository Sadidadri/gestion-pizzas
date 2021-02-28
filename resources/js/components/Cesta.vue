<template>
    <div id="content">
        <div class="cestaContent">
            <h5 class="text-center">Estado de tu pedido:</h5>
            
            <div id="botonesCesta" class="d-flex justify-content-between">
                <a class="close" href="#">Pedir</a>
                <a class="close" href="#">Volver</a></p>
            </div>
        </div>

        <div class="text-right">
            <a id="cestabutton" href="#">Ver cesta</a>
        </div>
    </div>
</template>


<style>
  @import '../../css/cesta.css';
</style>
<script>
    export default {
        name:"cesta",
        data() {
            return {
                
            }
        },
        created() {

            
        },
        mounted(){
            function deselect(e) {
                $('.cestaContent').slideFadeToggle(function() {
                e.removeClass('selected');
                });    
                }
            
            $(function() {
                $('#cestabutton').on('click', function() {
                if($(this).hasClass('selected')) {
                    deselect($(this));               
                } else {
                    $(this).addClass('selected');
                    $('.cestaContent').slideFadeToggle();
                }
                return false;
                });
            
                $('.close').on('click', function() {
                deselect($('#cestabutton'));
                return false;
                });
            });
            
            $.fn.slideFadeToggle = function(easing, callback) {
                return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
            };
        },
        methods: {
            
        }
    }

</script>