@extends('common')
@section('content')     
<style>
.am-u-sm-12
{

}
</style>
<div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span>文章列表
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                <i class="am-icon-search"></i>
                                <input type="text" class="form-control form-control-solid" placeholder="搜索标题" name="search" id="search" value=""> 
                                <a href="article/add"><button  style="position: absolute;left: -100px;top: 2px;" articleid="" class=" am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>添加</button></a>
                            </div>
                            
                                
                        </div>
                    </div>


                </div>
                <div class="tpl-block">
 
                      
                        <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <!-- <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th> -->
                                            <th class="table-id">序号</th>
                                            <th class="table-title">标题</th>
                                            <th class="table-type">发布板块</th>
                                            <th class="table-type">是否被推荐</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- {{$i=1}}; -->
                                        @foreach($articles as $article)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><a href=""> {{$article->title}}</a></td>
                                                <td class="am-hide-sm-only">{{$article->category->name}}</td>
                                                @if($article->recommend==1)
                                                <td>是</td> 
                                                @else
                                                <td>否</td>
                                                @endif
                                                <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <a href="article/{{$article->id}}/edit"><button  articleid="{{$article->id}}" class=" am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>编辑</button></a>
                                                        <button articleid="{{$article->id}}"  class="delbutton am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only editbtn"><span class="am-icon-trash-o"></span>删除</button>
                                                    </div>
                                                </div>
                                            </td>
                                            </tr>
                                            <!-- {{$i++}}; -->
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="am-u-lg-12">
                                <div class="am-cf">

                                    <div class="am-fr">
                                  <!-- 显示分页 -->
                                 {!! $articles->render() !!}
                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>
           




<script>
	$('.am-icon-search').click(function(){
		location.href="/admin/article?search="+$('#search').val();
	})
    //删除
    $(".delbutton").on('click',function(){
        var id= $(this).attr('articleid');
        $.ajax({
            url:'{{url("/admin/delarticle")}}',
            type:'DELETE',
            data:{
                'id':id,
                "_token": "{!! csrf_token() !!}",
            },
            success:function(data){
                if(data){
                    layer.msg('删除成功!');
                    location =location;
                }else{
                    layer.msg('删除失败!');
                }
            }
        })
    })
    //搜索功能
    $('.am-icon-search').click(function(){
        var s=$('#search').val(); 
        if(s=='')
        {
            location=location;
        }else{
            $.get("{{url('/admin/search')}}",{'s':s},function(res){
           console.log(res);
        });
        }
    })
</script>
@stop