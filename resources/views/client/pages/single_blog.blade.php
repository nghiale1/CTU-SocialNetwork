@extends('client.client')
@section('content')

<!-- Page Content -->
<div class="container blog singlepost">
    <div class="row">
        <article class="col-md-8">
            <h1 class="page-header sidebar-title">Single Post Title</h1>
            <img src="{{asset('client/images/unsplash1.jpg')}}" class="img-responsive" alt="photo" />
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="entry-meta">
                        <span><i class="fa fa-calendar-o"></i> 18 August 2014</span>
                        <span><i class="fa fa-user"></i> Posted by <a href="#">admin</a></span>
                        <span> <i class="fa fa-tag"></i> <a href="#" rel="tag">Audio</a></span>
                        <div class="pull-right"><span><i class="fa fa-eye"></i> 184</span> <span><i
                                    class="fa fa-comment"></i> 4</span></div>
                    </div>
                </div>
            </div>
            <p>This is some dummy copy. You&rsquo;re not really supposed to read this dummy copy, it is just a place
                holder for people who need some type to visualize what the actual copy might look like if it were real
                content.</p>
            <p>If you want to read, I might suggest a good book, perhaps <a title="Hemingway"
                    href="http://en.wikipedia.org/wiki/Ernest_Hemingway">Hemingway</a> or <a title="Melville"
                    href="http://en.wikipedia.org/wiki/Herman_Melville">Melville</a>. That&rsquo;s why they call it, the
                dummy copy. This, of course, is not the real copy for this entry. Rest assured, the words will expand
                the concept. With clarity. Conviction. And a little wit.</p>
            <p>In today&rsquo;s competitive <a title="market environment"
                    href="http://en.wikipedia.org/wiki/Market_environment">market environment</a>, the body copy of your
                entry must lead the reader through a series of <strong>disarmingly simple thoughts</strong>.</p>
            <p>All your supporting arguments must be communicated with simplicity and charm. And in such a way that the
                reader will read on. (After all, that&rsquo;s a reader&rsquo;s job: to read, isn&rsquo;t it?) And by the
                time your readers have reached this point in the finished copy, you will have convinced them that you
                not only respect their intelligence, but you also <strong>understand their needs as consumers</strong>.
            </p>
            <p>As a result of which, your entry will repay your <a title="writing"
                    href="http://en.wikipedia.org/wiki/Writing">efforts</a>. Take your sales; simply put, they will
                rise. Likewise your credibility. There&rsquo;s every chance your competitors will wish they&rsquo;d
                placed this entry, not you. While your customers will have probably forgotten that your competitors even
                exist. Which brings us, by a somewhat circuitous route, to another small point, but one which we feel
                should be raised.</p>
            <h3>Long copy or short – You decide</h3>
            <p>As a marketer, you probably don&rsquo;t even believe in body copy. <strong>Let alone long body
                    copy</strong>. (Unless you have a long body yourself.) Well, truth is, who&lsquo;s to blame you?
                Fact is, too much long body copy is dotted with such indulgent little phrases like <a title="truth"
                    href="http://en.wikipedia.org/wiki/Truth">truth</a> is, fact is, and who&rsquo;s to blame you. Trust
                us: we guarantee, with a hand over our heart, that no such indulgent rubbish will appear in your entry.
                That&rsquo;s why God gave us big blue pencils. So we can expunge every example of witted waffle.</p>
            <blockquote>
                <p>For you, the skies will be blue, the birds will sing, and your copy will be crafted by a dedicated
                    little man whose wife will be sitting at home, knitting, wondering why your entry demands more of
                    her husband&lsquo;s time than it should.</p>
            </blockquote>
            <p>But you will know why, won&lsquo;t you? You will have given her husband a chance to immortalize himself
                in print, writing some of the most persuasive prose on behalf of a truly enlightened purveyor of <a
                    title="widgets" href="http://en.wikipedia.org/wiki/Widgets">widgets</a>. And so, while your
                dedicated reader, enslaved to each mellifluous paragraph, clutches his newspaper with increasing
                interest and intention to purchase, you can count all your increased profits and take pots of money to
                your bank. Sadly, this is not the real copy for this entry. <strong>But it could well be</strong>. All
                you have to do is look at the <a title="account executive"
                    href="http://en.wikipedia.org/wiki/Account_executive">account executive</a> sitting across your desk
                (the fellow with the lugubrious face and the calf-like eyes), and say &rdquo;Yes! Yes! Yes!&ldquo; And
                anything you want, body copy, dinners, women, will be yours. Couldn&rsquo;t be fairer than that, could
                we?</p>

            <div class="mysharing">
                <!-- Twitter -->
                <a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank"
                    class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank"
                    class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                <!-- Google+ -->
                <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank"
                    class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
                <!-- LinkedIn -->
                <a href="http://www.linkedin.com/shareArticle?mini=true" title="Share on LinkedIn" target="_blank"
                    class="btn btn-linkedin"><i class="fa fa-linkedin"></i> LinkedIn</a>
            </div>

            <!-- Blog Comments -->
            <div class="comments1">
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <hr>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('client/images/avatar1.png')}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Author Name
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                        commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                        nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('client/images/avatar1.png')}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Author Name
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                        commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                        nunc ac nisi vulputate fringilla.
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{asset('client/images/avatar1.png')}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Author Name
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- Blog Sidebar Column -->
        <aside class="col-md-4 sidebar-padding">
            <div class="blog-sidebar">
                <div class="input-group searchbar">
                    <input type="text" class="form-control searchbar" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Search</button>
                    </span>
                </div><!-- /input-group -->
            </div>
            <!-- Blog Categories -->
            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Categories</h4>
                <hr>
                <ul class="sidebar-list">
                    <li><a href="#">Applications</a></li>
                    <li><a href="#">Photography</a></li>
                    <li><a href="#">Art Design</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Category Name</a></li>
                </ul>
            </div>
            <!-- Recent Posts -->
            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Recent Posts</h4>
                <hr style="margin-bottom: 5px;">

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="{{asset('client/images/blog1.jpg')}}"
                            alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 1</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="{{asset('client/images/blog2.jpg')}}"
                            alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 2</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="{{asset('client/images/blog3.jpg')}}"
                            alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 3</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="{{asset('client/images/blog1.jpg')}}"
                            alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 4</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>
            </div>

            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-comments"></i> Recent Comments</h4>
                <hr style="margin-bottom: 5px;">
                <ul class="sidebar-list">
                    <li>
                        <h5 class="blog-title">Author Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore</p>
                    </li>
                    <li>
                        <h5 class="blog-title">Author Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore</p>
                    </li>
                    <li>
                        <h5 class="blog-title">Author Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore</p>
                    </li>
                </ul>
            </div>

        </aside>
    </div>
</div>
@endsection