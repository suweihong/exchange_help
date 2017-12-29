<html >
 <head>


 </head>
 <body data-type="generalComponents" >
   @extends('common') @section('content')     
  <style>
.am-u-sm-3 {
    width: 10%;
}
.am-u-sm-9 {
    width: 88%;
}
</style>  

  <div class="tpl-page-container tpl-page-header-fixed" style="margin-top:0px;"> 
  
   <div class="tpl-content-wrapper tpl-content-wrapper-hover"> 
    <div class="tpl-portlet-components"  > 
     <div class="portlet-title"  > 
      <div class="caption font-green bold"> 
       <span class="am-icon-code"></span> 文章修改 
      </div> 
      <div class="tpl-portlet-input tpl-fz-ml"> 
       <div class="portlet-input input-small input-inline"> 
       </div> 
      </div> 
      <div class="tpl-block"> 
       <div class="am-g"> 
        <div class="tpl-form-body tpl-form-line"> 
         <form class="am-form tpl-form-line-form"> 
          <div class="am-form-group" > 
          
          </div> 
          <div class="am-form-group"> 
           <label for="user-phone" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">title</span></label> 
           <div class="am-u-sm-9"> 
            
             <input type="text" class="tpl-form-input" name="article_title" id="inputtitle" value="{{$res['title']}}" /> 
          
           </div> 
          </div>
           <div class="am-form-group"> 
           <label for="user-phone" class="am-u-sm-3 am-form-label">发布板块 <span class="tpl-form-line-small-title">Author</span></label> 
           <div class="am-u-sm-9"> 
            <select id="inputbankuai" data-am-selected="{searchBox: {{$res['category_id']}}"> 
            <!--  <option value="0" disabled>--请选择--</option> -->
                  @foreach($categorys as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
            </select> 
          
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-phone" class="am-u-sm-3 am-form-label">是否推荐该文章 <span class="tpl-form-line-small-title">Recommend</span></label> 
           <div class="am-u-sm-9"> 
            <select id="inputbankuai1" data-am-selected="{searchBox: 1}"> 
                  <option value="0" disabled>--请选择--</option>
                  <option value="1">极力推荐</option>
                  <option value="2">放弃推荐</option>
            </select> 
          
           </div> 
          </div>
          <div class="am-form-group"> 
           <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title">Images</span></label> 
           <div class="am-u-sm-9"> 
            <div class="am-form-group am-form-file"> 
             <div class="tpl-form-file-img"> 

              <img id="suo" width="200px" alt="" /> 
             </div> 
             <button type="button" class="am-btn am-btn-danger am-btn-sm"> <i class="am-icon-cloud-upload"></i> 修改封面图片</button> 
             <input id="file_upload" type="file" multiple="" /> 
            </div> 
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容<span class="tpl-form-line-small-title">Content</span></label> 
           <div class="am-u-sm-9"> 
            <script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.config.js')}}"></script> 
            <script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/ueditor.all.min.js')}}"> </script> 
            <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败--> 
            <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文--> 
            <script type="text/javascript" charset="utf-8" src="{{asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script> 
            <script id="editor" name="art_content" type="text/plain" style="width:92%;height:800px;"></script> 
          
            <script>       
              //初始化百度编辑器                      
                var content = '';
                var ue = UE.getEditor("editor", {
                         initialContent: '{{$res->content}}'
                    }); 
                    // {!! $res->content !!}                      
            </script> 
            <style>
                .edui-default{line-height: 28px;}
                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                {overflow: hidden; height:20px;}
                div.edui-box{overflow: hidden; height:22px;}
            </style> 

           </div> 
          </div> 
          <script>
                 $(".edui-box").html();
          </script>
          <div class="am-form-group"> 
                  
           </div> 
          </div> 
         </form> 
       
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    
   </div>   

  <script type="text/javascript">
          //ajax
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          var suoimg = '';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function () {
                $("#file_upload").change(function () {
                    $('img1').show();
                    uploadImage();
                });
            });
                function uploadImage() {
                // 判断是否有选择上传文件
                var imgPath = $("#file_upload").val();
                if (imgPath == "") {
                    layer.msg("请选择上传图片！");
                    return;
                }
                //判断上传文件的后缀名
                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                if (strExtension != 'jpg' && strExtension != 'gif'
                    && strExtension != 'png' && strExtension != 'bmp') {
                    layer.msg("请选择图片文件");
                    return;
                }
                // var formData = new FormData($('#art_form')[0]);
                var formData = new FormData();
                formData.append('file_upload', $('#file_upload')[0].files[0]);
                formData.append('_token',"{{csrf_token()}}");
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/upload')}}",
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        var src = "{{url('/uploads')}}" + '/' +data;
                        $("#suo").attr('src',src);
                        suoimg = data;
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
            //提交动作
            $("#go").on('click',function(){
            var id={{$res['id']}};
            var title = $("#inputtitle").val();
            var bankuai = $("#inputbankuai").val();
            var recommend=$("#inputbankuai1").val();
            var content =ue.body.innerHTML;
            if(title==""){
                layer.msg('标题不能为空');
            }else if(bankuai=='0'){
                layer.msg('请选择板块名');
            }else if(content=='<p><br></p>'){
                layer.msg('文章内容不能为空')
            }else if(suoimg==''){
                layer.msg('请选择封面图片');
            }else{
                $.post("{{url('/admin/editarticle')}}",{'_token':'{{csrf_token()}}','title':title,'bankuai':bankuai,'content':content,'id':id,'img':suoimg,'recommend':recommend},function(res){
          if(res){
            layer.msg('修改成功');
           location.href="/admin/article";
            
          }else{
            layer.msg('修改失败');
            setTimeout(function () {
                        location.reload(true);
                    }, 500);
          } 
        });
            }

            });
        </script> 

    
   @stop
  </div>
 </body>
</html> 

<div  style="width:100%;background-color:#ccc;position:fixed; z-index:1000;bottom:0;" >
<center style="margin:10px auto">
        <button type="button" id="go" style="content:center;" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
 </center>


</div>