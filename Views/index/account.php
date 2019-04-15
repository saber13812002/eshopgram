<script src="https://raw.githubusercontent.com/davidjbradshaw/imagemap-resizer/master/js/imageMapResizer.min.js"></script>
<script>

    function addproductdetail() {
        alert('add');
    }
    $(document).ready(function () {
        $('img').click(function (e) {
            var offset = $(this).offset();
            //alert(e.pageX - offset.left);
            leftpos = e.pageX - offset.left;
            toppos = e.pageY - offset.top;
            //alert(toppos);
            $('<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProductDetails"  href="javascript:{}">').appendTo('#map_div').text('این کالا را اضافه میکنم').css({position: 'absolute',
                top: toppos + 'px',
                left: leftpos + 'px'

            });
        });
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <?php
            foreach ($this->instagram['data'] as $value) {
                ?>
                <div id="map_div" class="text-center">
                    <?php
                    foreach ($value['carousel_media'] as $img) {
                        if ($img['type']=='image') {
                            //  var_dump($img['images']['standard_resolution']['url']);
                            ?>
                            <img width="245" height="226" usemap="#imagetemp" id='img' class="img-responsive"  src="<?php echo $img['images']['standard_resolution']['url']; ?>" />
                            <?php
                        } elseif ($img['type']=='video') {
                            ?>
                            <video width="400" controls>
                                <source src="<?php echo $img['videos']['standard_resolution']['url']; ?>" type="video/mp4">
                            </video>

                            <?php
                        }
                    }
                    ?>
                </div>
                    <?php
                }
                foreach ($this->instagram['graphql']['user']['edge_owner_to_timeline_media']['edges'] as $value) {
                    //var_dump($value['node']['is_video']) ; 
                    if (!$value['node']['is_video']) {
                        if ($value['node']['id'] == $this->id) {
                            ?>
                        <div id="map_div" class="text-center">
            <!--                            <img src="planets.gif" width="145" height="126" alt="Planets" usemap="#imagetemp">-->
                            <img width="245" height="226" usemap="#imagetemp" id='img' class="img-responsive"  src="<?php echo $value['node']['thumbnail_resources'][4]['src']; ?>" />
                            <map name="imagetemp">
                                <area shape="rect" coords="0,0,82,126" alt="Sun" href="../../plg/product/<?php echo $value['node']['id']; ?>">
                                <area shape="circle" coords="90,58,3" alt="Mercury" href="mercur.htm">
                                <area shape="circle" coords="124,58,8" alt="Venus" href="venus.htm">
                            </map>



                        </div>
            <?php
        }
    }
}
?>
        </div>
    </div>

    <div>فروشگاه اینترنتی دارم</div>
    <div>فروشگاه اینترنتی دارم</div>
    <div>
        <div style="float:right"> قیمت </div> <div style="float:right"><input type="text" name='price'> </div>
        <div style="float:right"> توضیحات </div> <div style="float:right"><input type="text" name='description'> </div>
        <div style="float:right">  </div> <div style="float:right"><input type="submit" name='description'> </div>

    </div>

</div>


<div class="modal fade" id="AddProductDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body rtl">
                <div class="input-group">
                    <span class="input-group-addon">نام کالا</span>
                    <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">  قیمت</span>
                    <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="button" class="btn btn-primary" onclick="addproductdetail()" >ثبت تغییرات</button>
            </div>
        </div>
    </div>
</div>
