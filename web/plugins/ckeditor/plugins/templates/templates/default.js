//加入template
CKEDITOR.addTemplates(
        'default',
        {
            imagesPath: CKEDITOR.getUrl('../ckeditor/plugins/templates/templates/images/'),
            insertOption: false,
            templates: [
                {
                    title: '主標、副標、內容',
                    image: '主標、副標、內容.png',
                    description: '主標、副標、內容',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="title">主標、副標、內容的主標</div>' +
                            '<div class="title-sub">主標、副標、內容的副標</div>' +
                            '<p class="text">主標、副標、內容的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '左圖右文',
                    image: '左圖右文.png',
                    description: '左圖右文',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/1920/1080/?random=3" alt="img"/>' +
                            '<div class="text-sub">左圖右文的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-6 col-12 p-3">' +
                            '<div class="title">左圖右文的主標</div>' +
                            '<div class="title-sub">左圖右文的副標</div>' +
                            '<p class="text">左圖右文的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '左文右圖',
                    image: '左文右圖.png',
                    description: '左文右圖',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12 p-3">' +
                            '<div class="title">左文右圖的主標</div>' +
                            '<div class="title-sub">左文右圖的副標</div>' +
                            '<p class="text">左文右圖的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '<div class="col-md-6 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/1920/1080/?random=2" alt="img"/>' +
                            '<div class="text-sub">左文右圖的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中大圖[滿版]',
                    image: '置中大圖[滿版].png',
                    description: '置中大圖[滿版]',
                    html: '<div class="container-fluid">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="row">' +
                            '<img src="https://picsum.photos/1920/1080/?random=1" class="img-fluid" alt="Fluid image">' +
                            '<div class="text-sub">置中大圖[滿版]的圖片說明文字</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中大圖',
                    image: '置中大圖.png',
                    description: '置中大圖',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/1920/920/?random=1" alt="img"/>' +
                            '<div class="text-sub">置中大圖的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中兩圖',
                    image: '置中兩圖.png',
                    description: '置中兩圖',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/360/?random=1" alt="img"/>' +
                            '<div class="text-sub">置中兩圖的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-6 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/360/?random=2" alt="img"/>' +
                            '<div class="text-sub">置中兩圖的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中三圖',
                    image: '置中三圖.png',
                    description: '置中三圖',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-4 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/480/?random=1" alt="img"/>' +
                            '<div class="text-sub">置中三圖的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-4 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/480/?random=2" alt="img"/>' +
                            '<div class="text-sub">置中三圖的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-4 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/480/?random=3" alt="img"/>' +
                            '<div class="text-sub">置中三圖的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中四圖',
                    image: '置中四圖.png',
                    description: '置中四圖',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/580/?random=1" alt="img"/>' +
                            '<div class="text-sub">置中四圖的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/580/?random=2" alt="img"/>' +
                            '<div class="text-sub">置中四圖的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/580/?random=3" alt="img"/>' +
                            '<div class="text-sub">置中四圖的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://picsum.photos/920/580/?random=4" alt="img"/>' +
                            '<div class="text-sub">置中四圖的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '左影右文[連結]',
                    image: '左影右文[連結].png',
                    description: '左影右文[連結]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12">' +
                            '<div class="video-wrap embeddedContent oembed-provider oembed-provider-youtube embed-responsive embed-responsive-16by9" data-align="center" data-maxwidth="560" data-maxheight="315" data-oembed="https://www.youtube.com/embed/nnTeuqC8D7A" data-oembed_provider="youtube" data-resizetype="responsive" data-title="youtube" style="text-align: center;">' +
                            '<iframe src="https://www.youtube.com/embed/nnTeuqC8D7A" title="link video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
                            '</div>' +
                            '<div class="text-sub">左影右文[連結]的影片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-6 col-12 p-3">' +
                            '<div class="title">左影右文[連結]的主標</div>' +
                            '<div class="title-sub">左影右文[連結]的副標</div>' +
                            '<p class="text">左影右文[連結]的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '左文右影[連結]',
                    image: '左文右影[連結].png',
                    description: '左文右影[連結]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12 p-3">' +
                            '<div class="title">左文右影[連結]的主標</div>' +
                            '<div class="title-sub">左文右影[連結]的副標</div>' +
                            '<p class="text">左文右影[連結]的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '<div class="col-md-6 col-12">' +
                            '<div class="video-wrap embeddedContent oembed-provider oembed-provider-youtube embed-responsive embed-responsive-16by9" data-align="center" data-maxwidth="560" data-maxheight="315" data-oembed="https://www.youtube.com/embed/nnTeuqC8D7A" data-oembed_provider="youtube" data-resizetype="responsive" data-title="youtube" style="text-align: center;">' +
                            '<iframe src="https://www.youtube.com/embed/nnTeuqC8D7A" title="link video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
                            '</div>' +
                            '<div class="text-sub">左文右影[連結]的影片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中影片[連結]',
                    image: '置中影片[連結].png',
                    description: '置中影片[連結]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="video-wrap embeddedContent oembed-provider oembed-provider-youtube embed-responsive embed-responsive-16by9" data-align="center" data-maxwidth="560" data-maxheight="315" data-oembed="https://www.youtube.com/embed/nnTeuqC8D7A" data-oembed_provider="youtube" data-resizetype="responsive" data-title="youtube" style="text-align: center;">' +
                            '<iframe src="https://www.youtube.com/embed/nnTeuqC8D7A" title="link video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
                            '</div>' +
                            '<div class="text-sub">置中影片[連結]的影片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '左影右文[video]',
                    image: '左影右文[video].png',
                    description: '左影右文[video]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12">' +
                            '<div class="video-wrap ckeditor-html5-video" style="text-align: center;">' +
                            '<video playsinline muted autoplay="autoplay" loop="loop" controlslist="nodownload" src="../src/images/video.mp4" width="100%">&nbsp;</video>' +
                            '</div>' +
                            '<div class="text-sub">左影右文[video]的影片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-6 col-12 p-3">' +
                            '<div class="title">左影右文[video]的主標</div>' +
                            '<div class="title-sub">左影右文[video]的副標</div>' +
                            '<p class="text">左影右文[video]的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '左文右影[video]',
                    image: '左文右影[video].png',
                    description: '左文右影[video]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12 p-3">' +
                            '<div class="title">左文右影[video]的主標</div>' +
                            '<div class="title-sub">左文右影[video]的副標</div>' +
                            '<p class="text">左文右影[video]的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '<div class="col-md-6 col-12">' +
                            '<div class="video-wrap ckeditor-html5-video" style="text-align: center;">' +
                            '<video playsinline muted autoplay="autoplay" loop="loop" controlslist="nodownload" src="../src/images/video.mp4" width="100%">&nbsp;</video>' +
                            '</div>' +
                            '<div class="text-sub">左文右影[video]的影片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中影片[video]',
                    image: '置中影片[video].png',
                    description: '置中影片[video]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="video-wrap ckeditor-html5-video" style="text-align: center;">' +
                            '<video playsinline muted autoplay="autoplay" loop="loop" controlslist="nodownload" src="../src/images/video.mp4" width="100%">&nbsp;</video>' +
                            '</div>' +
                            '<div class="text-sub">置中影片[video]的影片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '分隔線',
                    image: '分隔線.png',
                    description: '分隔線',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<hr />' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '表格[左標題右內容]',
                    image: '表格[左標題右內容].png',
                    description: '表格[左標題右內容]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="text-sub">表格[左標題右內容]的表格說明文字</div>' +
                            '<table class="table">' +
                            '<tbody>' +
                            '<tr><th scope="row">表格標題</th><td>表格內容</td><td>表格內容</td></tr>' +
                            '<tr><th scope="row">表格標題</th><td>表格內容</td><td>表格內容</td></tr>' +
                            '<tr><th scope="row">表格標題</th><td>表格內容</td><td>表格內容</td></tr>' +
                            '<tr><th scope="row">表格標題</th><td>表格內容</td><td>表格內容</td></tr>' +
                            '</tbody>' +
                            '</table>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '表格[上標題下內容]',
                    image: '表格[上標題下內容].png',
                    description: '表格[上標題下內容]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="text-sub">表格[上標題下內容]的表格說明文字</div>' +
                            '<table class="table">' +
                            '<thead>' +
                            '<tr><th scope="col">表格標題</th><th scope="col">表格標題</th></tr>' +
                            '</thead>' +
                            '<tbody>' +
                            '<tr><td>表格內容</td><td>表格內容</td></tr>' +
                            '<tr><td>表格內容</td><td>表格內容</td></tr>' +
                            '<tr><td>表格內容</td><td>表格內容</td></tr>' +
                            '<tr><td>表格內容</td><td>表格內容</td></tr>' +
                            '</tbody>' +
                            '</table>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中大圖[滿版][圖片文字]',
                    image: '置中大圖[滿版][圖片文字].png',
                    description: '置中大圖[滿版][圖片文字]',
                    html: '<div class="container-fluid">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="row position-relative">' +
                            '<img src="https://fakeimg.pl/1920x1080" class="img-fluid" alt="Fluid image">' +
                            '<div class="text-under">置中大圖[滿版][圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中大圖[滿版][圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中大圖[圖片文字]',
                    image: '置中大圖[圖片文字].png',
                    description: '置中大圖[圖片文字]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/1920x920" alt="img"/>' +
                            '<div class="text-under">置中大圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中大圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中兩圖[圖片文字]',
                    image: '置中兩圖[圖片文字].png',
                    description: '置中兩圖[圖片文字]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x360" alt="img"/>' +
                            '<div class="text-under">置中兩圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中兩圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-6 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x360" alt="img"/>' +
                            '<div class="text-under">置中兩圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中兩圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'

                },
                {
                    title: '置中三圖[圖片文字]',
                    image: '置中三圖[圖片文字].png',
                    description: '置中三圖[圖片文字]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-4 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x480" alt="img"/>' +
                            '<div class="text-under">置中三圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中三圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-4 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x480" alt="img"/>' +
                            '<div class="text-under">置中三圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中三圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-4 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x480" alt="img"/>' +
                            '<div class="text-under">置中三圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中三圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'


                },
                {
                    title: '置中四圖[圖片文字]',
                    image: '置中四圖[圖片文字].png',
                    description: '置中四圖[圖片文字]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x580" alt="img"/>' +
                            '<div class="text-under">置中四圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中四圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x580" alt="img"/>' +
                            '<div class="text-under">置中四圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中四圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x580" alt="img"/>' +
                            '<div class="text-under">置中四圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中四圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '<div class="col-md-3 col-12">' +
                            '<img class="img-fluid" src="https://fakeimg.pl/920x580" alt="img"/>' +
                            '<div class="text-under">置中四圖[圖片文字]的圖片上的文字</div>' +
                            '<div class="text-sub">置中四圖[圖片文字]的圖片說明文字</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '置中三圖(圓)',
                    image: '置中三圖(圓).png',
                    description: '置中三圖(圓)',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="row justify-content-center justify-content-md-around px-md-5">' +
                            '<div class="col-8 col-sm-4 col-lg-3">' +
                            '<div class="img-box-round mb-3 overflow-hidden">' +
                            '<img src="https://fakeimg.pl/350x350" alt="" class="img-fluid">' +
                            '</div>' +
                            '<p class="title text-center">上圖下文(圓)主標</p>' +
                            '<p class="text-center">上圖下文(圓)內文內文</p>' +
                            '</div>' +
                            '<div class="col-8 col-sm-4 col-lg-3">' +
                            '<div class="img-box-round mb-3 overflow-hidden">' +
                            '<img src="https://fakeimg.pl/350x350" alt="" class="img-fluid">' +
                            '</div>' +
                            '<p class="title text-center">上圖下文(圓)主標</p>' +
                            '<p class="text-center">上圖下文(圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '<div class="col-8 col-sm-4 col-lg-3">' +
                            '<div class="img-box-round mb-3 overflow-hidden">' +
                            '<img src="https://fakeimg.pl/350x350" alt="" class="img-fluid">' +
                            '</div>' +
                            '<p class="title text-center">上圖下文(圓)主標</p>' +
                            '<p class="text-center">上圖下文(圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '左圖右文(小圓)',
                    image: '左圖右文(小圓).png',
                    description: '左圖右文(小圓)',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="row justify-content-center mb-3">' +
                            '<div class="col-4 col-sm-3 col-md-2 col-xl-1 pl-0">' +
                            '<div class="img-box-round">' +
                            '<img src="https://fakeimg.pl/160x160" alt="">' +
                            '</div>' +
                            '</div>' +
                            '<div class="text-box col-8 col-sm-9 col-md-10 col-xl-11">' +
                            '<p class="title m-0">左圖右文(小圓)主標</p>' +
                            '<p class="mb-0">左圖右文(小圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '</div>' +
                            '<div class="row justify-content-center mb-3">' +
                            '<div class="col-4 col-sm-3 col-md-2 col-xl-1 pl-0">' +
                            '<div class="img-box-round">' +
                            '<img src="https://fakeimg.pl/160x160" alt="">' +
                            '</div>' +
                            '</div>' +
                            '<div class="text-box col-8 col-sm-9 col-md-10 col-xl-11">' +
                            '<p class="title m-0">左圖右文(小圓)主標</p>' +
                            '<p class="mb-0">左圖右文(小圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '連結圖片',
                    image: '連結圖片.png',
                    description: '連結圖片',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12">' +
                            '<div class="row justify-content-center">' +
                            '<a href="#" class="col-10 col-sm-7 col-md-6 col-lg-4">' +
                            '<img src="https://fakeimg.pl/350x130" alt="" class="img-fluid" />' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '表格[聯絡資訊]',
                    image: '表格[聯絡資訊].png',
                    description: '表格[聯絡資訊]',
                    html: '<div class="container">' +
                            '<div class="row custom-table">' +
                            '<div class="col-12 control-btnGroup">' +
                            '<i class="fas fa-chevron-circle-up"></i>' +
                            '<i class="fas fa-chevron-circle-down"></i>' +
                            '<i class="fas fa-times-circle"></i>' +
                            '</div>' +
                            '<div class="col-12 custom-table">' +
                            '<div class="title">表格[聯絡資訊]的主標</div>' +
                            '</div>' +
                            '<div class="col-md-4"><p>地　　址</p></div>' +
                            '<div class="col-md-8"><p>台北市衡陽路91號2至5樓</p></div>' +
                            '<div class="col-md-4"><p>傳　　真</p></div>' +
                            '<div class="col-md-8">' +
                            '<div class="row right">' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-4"><p>電　　話</p></div>' +
                            '<div class="col-md-8"><p>(02)2382-5460</p></div>' +
                            '<div class="col-md-4"><p>客服專線<br/>聯絡信箱</p></div>' +
                            '<div class="col-md-8"><p>管理部  (02)2383-1616<br>service@megabills.com.tw</p></div>' +
                            '<div class="col-md-4"><p>業務專線</p></div>' +
                            '<div class="col-md-8">' +
                            '<div class="row right">' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-md-6"><p>風險控管部　(02)2382-5495</p></div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-4"><p>業務專線</p></div>' +
                            '<div class="col-md-8">' +
                            '<div class="row right">' +
                            '<div class="col-12"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-12"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-12"><p>風險控管部　(02)2382-5495</p></div>' +
                            '<div class="col-12"><p>風險控管部　(02)2382-5495</p></div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-4"><p>金融消費爭議專線<br>聯絡信箱</p></div>' +
                            '<div class="col-md-8"><p>管理部  (02)2381-0033<br>mb01@megabills.com.tw</p></div>' +
                            '<div class="col-md-4"><p>檢舉專線<br>聯絡信箱</p></div>' +
                            '<div class="col-md-8"><p>稽核室  (02)2382-5449<br>audit01@megabills.com.tw</p></div>' +
                            '<div class="col-md-4"><p>債協商及股票質借補充原則<br>諮詢申訴協調窗口 </p></div>' +
                            '<div class="col-md-8"><p>風險控管部 林政毅先生 (02)2316-8830</p></div>' +
                            '<div class="col-md-4"><p>不良債權<br>售後申訴處理窗口</p></div>' +
                            '<div class="col-md-8"><p>風險控管部 徐毅智先生 (02)2316-8825</p></div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '主標副標內容[灰底]',
                    image: '主標副標內容[灰底].png',
                    description: '主標副標內容[灰底]',
                    html: '<div class="container">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-12 mb-3">' +
                            '<div class="title">主標副標內容[灰底]的主標</div>' +
                            '<div class="title-sub">主標副標內容[灰底]的副標</div>' +
                            '<p class="text">主標副標內容[灰底]的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>' +
                            '</div>' +
                            '<div class="col-12 text-bg-gray">' +
                            '<div class="bg-lightgray p-3">' +
                            '<p class="font-weight-bold text-purple">【例1】當投資人以9,994,250元，議定利率為年息0.7﹪，買斷距離到期日30 天票券時，投資人於持有到期時可收取的扣繳後金額為9,999,400元，利息收益為5,750元(扣繳稅款600元，扣繳後實際給付5,150元)。</p>' +
                            '<p class="font-weight-bold pl-3">應收(付)金額 = 10,000,000 ÷ (1 + 0.7% × 30 ÷ 365) - 0 = 9,994,250（元）<br>' +
                            '到期扣繳後兌償金額 = 10,000,000 - 600 = 9,999,400（元）</p>' +
                            '<p>＊因票券發行日當日即買斷，前手持有期間為0天，故前計算式前手利息累計稅款減項為0，若為發行後1天才買斷則為20元(即全期稅款600元除以30天)，餘類推。</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                },
                {
                    title: '主標副標內容[左右]',
                    image: '主標、副標、內容(左右).png',
                    description: '主標副標內容[左右]',
                    html: '<div class="container">' +
                            '<div class="row">' +
                            '<div class="col-12 control-btnGroup"><i class="fas fa-chevron-circle-up"></i><i class="fas fa-chevron-circle-down"></i><i class="fas fa-times-circle"></i></div>' +
                            '<div class="col-md-6 col-12 p-3 pr-md-5">' +
                            '<div class="title">主標副標內容[左右]的主標</div>' +
                            '<div class="title-sub">主標副標內容[左右]的副標</div>' +
                            '<p class="text">主標副標內容[左右]的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。' +
                            '</p>' +
                            '<div class="center_line"></div>' +
                            '</div>' +
                            '<div class="col-12 d-md-none">' +
                            '<hr>' +
                            '</div>' +
                            '<div class="col-md-6 col-12 p-3 pl-md-5 position-relative">' +
                            '<div class="title">主標副標內容[左右]的主標</div>' +
                            '<div class="title-sub">主標副標內容[左右]的副標</div>' +
                            '<p class="text">主標副標內容[左右]的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。' +
                            '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                }
            ]
        });