
<!DOCTYPE html>
<html dir="ltr" lang="zh-TW">
<head>
  <meta charset="utf-8">
  <title>{{$article->title}} &ndash;</title>
  <link rel="stylesheet" type="text/css" href="/home/css/less.css">
  <script src="/home/js/jquery-2.1.3.min.js"></script>
  <script src="/assets/js/jquery.min.js"></script>
  <header class="header">
  <div class="logo">
      <img src="/home/img/1.png" alt="ThaiEX">
  </div>
</header>
<main role="main">
    <div class="container-divider"></div>
    <div class="container">
    <nav class="sub-nav">
      <ol class="breadcrumbs">
        <li title="ThaiEX">
            <a href="/article">ThaiEX</a>
        </li>
        <li title="{{$article->category->name}}">
            <a href="/{{$article['category_id']}}">{{$article->category->name}}</a>
        </li>
        <li title="{{$article->category->name}}">
            文章详情
        </li>
      </ol>
    </nav>
 <div class="article-container" id="article-container">
    <section class="article-sidebar">
      <section class="section-articles collapsible-sidebar">
        <h3 class="collapsible-sidebar-title sidenav-title">此段落內的文章</h3>
        <ul></ul>
          <!-- <a href="#">檢視更多</a> -->
      </section>
    </section>
    <article class="article">
      <header class="article-header">
        <h1 title="{{$article->title}}" class="article-title">
           {{$article->title}}
        </h1>
        <div class="article-author">
          <div class="article-meta">
            <ul class="meta-group">
                <li class="meta-data"><time datetime="2017-11-29T02:18:12Z" title="2017-11-29T02:18:12Z" data-datetime="relative">{{$article->created_at->format("Y年m月d日 H:i:s")}}</time></li>
                <li class="meta-data">已更新</li>
            </ul>
          </div>
        </div>
        <!-- <a class="article-subscribe" rel="nofollow" role="button" data-auth-action="signin" aria-selected="false" href="#">追蹤</a> -->
      </header>

      <section class="article-info">
        <div class="article-content">
          <div class="article-body">
         {!! $article->content !!}
          </div>
          <div class="article-attachments">
            <ul class="attachments">
              
            </ul>
          </div>
        </div>
      </section>

      <footer>
        <div class="article-footer">
          <div class="article-share">
            </ul>
          </div>
          
        </div>
          <div class="article-votes">
            <span class="article-votes-question">這篇文章是否有幫助？</span>
            <div class="article-votes-controls" role='radiogroup'>
              <a role="radio" rel="nofollow" class="button article-vote article-vote-up article-useful" title="是" aria-selected="false" data-helper="vote" data-item="article" data-type="up" data-id="115003906793" data-upvote-count="14" data-vote-count="15" data-vote-sum="13" data-vote-url="/hc/zh-tw/articles/115003906793/vote" data-value="null" data-label="15 人中有 14 人覺得有幫助" data-selected-class="null" href=""></a>
            </div>
            <small class="article-votes-count">
              <span class="article-vote-label" data-helper="vote" data-item="article" data-type="label" data-id="115003906793" data-upvote-count="14" data-vote-count="15" data-vote-sum="13" data-vote-url="/hc/zh-tw/articles/115003906793/vote" data-value="null" data-label="15 人中有 14 人覺得有幫助">已有 {{$uu}} 人覺得有幫助</span>
            </small>
          </div>
        <div class="article-return-to-top">
          <a href="#top">返回頂端<span class="icon-arrow-up"></span></a>
        </div>
      </footer>
    </article>
  </div>
</div>
</main>
  <footer class="footer">
  <div class="footer-inner">
    <a title="主頁" href="/article">ThaiEX</a>
    <div class="footer-language-selector">
        <div class="dropdown language-selector" aria-haspopup="true">
          <a class="dropdown-toggle">
            繁體中文
          </a>
          <span class="dropdown-menu dropdown-menu-end" role="menu">
              <a href="#" dir="ltr" rel="nofollow" role="menuitem">
                English (US)
              </a>
          </span>
        </div>
    </div>
  </div>
</footer>
</body>
</html>
<script type="text/javascript">
    $(".article-useful").click(function(){
      $.get("/article/content/"+{{$article['id']}},{'u':1},function(res){
          console.log(res);
      });
    })
</script>