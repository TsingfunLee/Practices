 <div class="panel  cate-head sidebar-cate ">
            <!-- Tabs' Title -->
            <nav role="navigation" class="panel-heading">
                <ul role="tablist" class="nav nav-pills changeco" id="navTabs">
                    <li role="presentation"  class="active"><a href="#category">分类目录</a></li>
                    <li role="presentation"><a href="#tag">热门标签</a></li>
                    <li role="presentation"><a href="#link">友情链接</a></li>
                </ul>
            </nav>
            <!-- Tabs' Content -->
            <div class="panel-body tab-content">
                <!-- Categories -->
                <div role="tabpanel" class="tab-pane fade in active catemain-color" id="category">
                    <ul class="li-panel">
                <?php wp_list_categories('title_li=&sort_column=name&hierarchical=0'); ?>
           </ul>
                </div>
                <!-- Hot Tags -->
                <div role="tabpanel" class="tab-pane fade catemain-color" id="tag">
                   <?php wp_tag_cloud( 'smallest=8&largest=28&number=50' ); ?>
     </div>
                <!-- Friend Links -->
                <div role="tabpanel" class="tab-pane fade li-panel pane-color" id="link">
                    <ul>
                        <li><a href="#" title="github">github</a></li>
                        <li><a href="#" title="Mindon.IDEA">Mindon.IDEA</a></li>
                        <li><a href="#" title="Software MyZone">Software MyZone</a></li>
                    </ul>
                </div>
            </div>
        </div>