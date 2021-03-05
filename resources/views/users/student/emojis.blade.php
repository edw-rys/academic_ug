<div class="keyboard-container">
    <div id="keyboard">
        <ul id="functions">
            <dropdown class="emojis-container">

                <input class="emojis-input" id="emojis-input-{{$class_subject->id}}" type="checkbox" onChange="emojis_glow()" />
                <label for="emojis-input-{{$class_subject->id}}">
                    <li class="key fn emojis">
                        <b id="emojis-glow"></b>
                        <i class='em em-grinning emojis-icon f7-emojis'></i>
                        <span class="span_f7-emojis"></span>
                    </li>
                </label>

                <ul class="emojis-dropdown dropdown-submenu">
                    <li role="button" class="emoji emoji1f600" onclick="writeEmote('😀', '{{ $class_subject->id}}')" data-c="😀">😀</li>
                    <li role="button" class="emoji emoji1f603" onclick="writeEmote('😃', '{{ $class_subject->id}}')" data-c="😃">😃</li>
                    <li role="button" class="emoji emoji1f604" onclick="writeEmote('😄', '{{ $class_subject->id}}')" data-c="😄">😄</li>
                    <li role="button" class="emoji emoji1f601" onclick="writeEmote('😁', '{{ $class_subject->id}}')" data-c="😁">😁</li>
                    <li role="button" class="emoji emoji1f606" onclick="writeEmote('😆', '{{ $class_subject->id}}')" data-c="😆">😆</li>
                    <li role="button" class="emoji emoji1f605" onclick="writeEmote('😅', '{{ $class_subject->id}}')" data-c="😅">😅</li>
                    <li role="button" class="emoji emoji1f602" onclick="writeEmote('😂', '{{ $class_subject->id}}')" data-c="😂">😂</li>
                    <li role="button" class="emoji emoji1f923" onclick="writeEmote('🤣', '{{ $class_subject->id}}')" data-c="🤣">🤣</li>
                    <li role="button" class="emoji emoji1f607" onclick="writeEmote('😇', '{{ $class_subject->id}}')" data-c="😇">😇</li>
                    <li role="button" class="emoji emoji1f609" onclick="writeEmote('😉', '{{ $class_subject->id}}')" data-c="😉">😉</li>
                    <li role="button" class="emoji emoji1f60a" onclick="writeEmote('😊', '{{ $class_subject->id}}')" data-c="😊">😊</li>
                    <li role="button" class="emoji emoji1f642" onclick="writeEmote('🙂', '{{ $class_subject->id}}')" data-c="🙂">🙂</li>
                    <li role="button" class="emoji emoji1f643" onclick="writeEmote('🙃', '{{ $class_subject->id}}')" data-c="🙃">🙃</li>
                    <li role="button" class="emoji emoji1f60b" onclick="writeEmote('😋', '{{ $class_subject->id}}')" data-c="😋">😋</li>
                    <li role="button" class="emoji emoji1f60c" onclick="writeEmote('😌', '{{ $class_subject->id}}')" data-c="😌">😌</li>
                    <li role="button" class="emoji emoji1f60d" onclick="writeEmote('😍', '{{ $class_subject->id}}')" data-c="😍">😍</li>
                    <li role="button" class="emoji emoji1f970" onclick="writeEmote('🥰', '{{ $class_subject->id}}')" data-c="🥰">🥰</li>
                    <li role="button" class="emoji emoji1f618" onclick="writeEmote('😘', '{{ $class_subject->id}}')" data-c="😘">😘</li>
                    <li role="button" class="emoji emoji1f617" onclick="writeEmote('😗', '{{ $class_subject->id}}')" data-c="😗">😗</li>
                    <li role="button" class="emoji emoji1f619" onclick="writeEmote('😙', '{{ $class_subject->id}}')" data-c="😙">😙</li>
                    <li role="button" class="emoji emoji1f61a" onclick="writeEmote('😚', '{{ $class_subject->id}}')" data-c="😚">😚</li>
                    <li role="button" class="emoji emoji1f92a" onclick="writeEmote('🤪', '{{ $class_subject->id}}')" data-c="🤪">🤪</li>
                    <li role="button" class="emoji emoji1f61c" onclick="writeEmote('😜', '{{ $class_subject->id}}')" data-c="😜">😜</li>
                    <li role="button" class="emoji emoji1f61d" onclick="writeEmote('😝', '{{ $class_subject->id}}')" data-c="😝">😝</li>
                    <li role="button" class="emoji emoji1f61b" onclick="writeEmote('😛', '{{ $class_subject->id}}')" data-c="😛">😛</li>
                    <li role="button" class="emoji emoji1f911" onclick="writeEmote('🤑', '{{ $class_subject->id}}')" data-c="🤑">🤑</li>
                    <li role="button" class="emoji emoji1f60e" onclick="writeEmote('😎', '{{ $class_subject->id}}')" data-c="😎">😎</li>
                    <li role="button" class="emoji emoji1f913" onclick="writeEmote('🤓', '{{ $class_subject->id}}')" data-c="🤓">🤓</li>
                    <li role="button" class="emoji emoji1f9d0" onclick="writeEmote('🧐', '{{ $class_subject->id}}')" data-c="🧐">🧐</li>
                    <li role="button" class="emoji emoji1f920" onclick="writeEmote('🤠', '{{ $class_subject->id}}')" data-c="🤠">🤠</li>
                    <li role="button" class="emoji emoji1f973" onclick="writeEmote('🥳', '{{ $class_subject->id}}')" data-c="🥳">🥳</li>
                    <li role="button" class="emoji emoji1f917" onclick="writeEmote('🤗', '{{ $class_subject->id}}')" data-c="🤗">🤗</li>
                    <li role="button" class="emoji emoji1f921" onclick="writeEmote('🤡', '{{ $class_subject->id}}')" data-c="🤡">🤡</li>
                    <li role="button" class="emoji emoji1f60f" onclick="writeEmote('😏', '{{ $class_subject->id}}')" data-c="😏">😏</li>
                    <li role="button" class="emoji emoji1f636" onclick="writeEmote('😶', '{{ $class_subject->id}}')" data-c="😶">😶</li>
                    <li role="button" class="emoji emoji1f610" onclick="writeEmote('😐', '{{ $class_subject->id}}')" data-c="😐">😐</li>
                    <li role="button" class="emoji emoji1f611" onclick="writeEmote('😑', '{{ $class_subject->id}}')" data-c="😑">😑</li>
                    <li role="button" class="emoji emoji1f612" onclick="writeEmote('😒', '{{ $class_subject->id}}')" data-c="😒">😒</li>
                    <li role="button" class="emoji emoji1f644" onclick="writeEmote('🙄', '{{ $class_subject->id}}')" data-c="🙄">🙄</li>
                    <li role="button" class="emoji emoji1f928" onclick="writeEmote('🤨', '{{ $class_subject->id}}')" data-c="🤨">🤨</li>
                    <li role="button" class="emoji emoji1f914" onclick="writeEmote('🤔', '{{ $class_subject->id}}')" data-c="🤔">🤔</li>
                    <li role="button" class="emoji emoji1f92b" onclick="writeEmote('🤫', '{{ $class_subject->id}}')" data-c="🤫">🤫</li>
                    <li role="button" class="emoji emoji1f92d" onclick="writeEmote('🤭', '{{ $class_subject->id}}')" data-c="🤭">🤭</li>
                    <li role="button" class="emoji emoji1f925" onclick="writeEmote('🤥', '{{ $class_subject->id}}')" data-c="🤥">🤥</li>
                    <li role="button" class="emoji emoji1f633" onclick="writeEmote('😳', '{{ $class_subject->id}}')" data-c="😳">😳</li>
                    <li role="button" class="emoji emoji1f61e" onclick="writeEmote('😞', '{{ $class_subject->id}}')" data-c="😞">😞</li>
                    <li role="button" class="emoji emoji1f61f" onclick="writeEmote('😟', '{{ $class_subject->id}}')" data-c="😟">😟</li>
                    <li role="button" class="emoji emoji1f620" onclick="writeEmote('😠', '{{ $class_subject->id}}')" data-c="😠">😠</li>
                    <li role="button" class="emoji emoji1f621" onclick="writeEmote('😡', '{{ $class_subject->id}}')" data-c="😡">😡</li>
                    <li role="button" class="emoji emoji1f92c" onclick="writeEmote('🤬', '{{ $class_subject->id}}')" data-c="🤬">🤬</li>
                    <li role="button" class="emoji emoji1f614" onclick="writeEmote('😔', '{{ $class_subject->id}}')" data-c="😔">😔</li>
                    <li role="button" class="emoji emoji1f615" onclick="writeEmote('😕', '{{ $class_subject->id}}')" data-c="😕">😕</li>
                    <li role="button" class="emoji emoji1f641" onclick="writeEmote('🙁', '{{ $class_subject->id}}')" data-c="🙁">🙁</li>
                    <li role="button" class="emoji emoji1f62c" onclick="writeEmote('😬', '{{ $class_subject->id}}')" data-c="😬">😬</li>
                    <li role="button" class="emoji emoji1f97a" onclick="writeEmote('🥺', '{{ $class_subject->id}}')" data-c="🥺">🥺</li>
                    <li role="button" class="emoji emoji1f623" onclick="writeEmote('😣', '{{ $class_subject->id}}')" data-c="😣">😣</li>
                    <li role="button" class="emoji emoji1f616" onclick="writeEmote('😖', '{{ $class_subject->id}}')" data-c="😖">😖</li>
                    <li role="button" class="emoji emoji1f62b" onclick="writeEmote('😫', '{{ $class_subject->id}}')" data-c="😫">😫</li>
                    <li role="button" class="emoji emoji1f629" onclick="writeEmote('😩', '{{ $class_subject->id}}')" data-c="😩">😩</li>
                    <li role="button" class="emoji emoji1f971" onclick="writeEmote('🥱', '{{ $class_subject->id}}')" data-c="🥱">🥱</li>
                    <li role="button" class="emoji emoji1f624" onclick="writeEmote('😤', '{{ $class_subject->id}}')" data-c="😤">😤</li>
                    <li role="button" class="emoji emoji1f62e" onclick="writeEmote('😮', '{{ $class_subject->id}}')" data-c="😮">😮</li>
                    <li role="button" class="emoji emoji1f631" onclick="writeEmote('😱', '{{ $class_subject->id}}')" data-c="😱">😱</li>
                    <li role="button" class="emoji emoji1f628" onclick="writeEmote('😨', '{{ $class_subject->id}}')" data-c="😨">😨</li>
                    <li role="button" class="emoji emoji1f630" onclick="writeEmote('😰', '{{ $class_subject->id}}')" data-c="😰">😰</li>
                    <li role="button" class="emoji emoji1f62f" onclick="writeEmote('😯', '{{ $class_subject->id}}')" data-c="😯">😯</li>
                    <li role="button" class="emoji emoji1f626" onclick="writeEmote('😦', '{{ $class_subject->id}}')" data-c="😦">😦</li>
                    <li role="button" class="emoji emoji1f627" onclick="writeEmote('😧', '{{ $class_subject->id}}')" data-c="😧">😧</li>
                    <li role="button" class="emoji emoji1f622" onclick="writeEmote('😢', '{{ $class_subject->id}}')" data-c="😢">😢</li>
                    <li role="button" class="emoji emoji1f625" onclick="writeEmote('😥', '{{ $class_subject->id}}')" data-c="😥">😥</li>
                    <li role="button" class="emoji emoji1f62a" onclick="writeEmote('😪', '{{ $class_subject->id}}')" data-c="😪">😪</li>
                    <li role="button" class="emoji emoji1f924" onclick="writeEmote('🤤', '{{ $class_subject->id}}')" data-c="🤤">🤤</li>
                    <li role="button" class="emoji emoji1f613" onclick="writeEmote('😓', '{{ $class_subject->id}}')" data-c="😓">😓</li>
                    <li role="button" class="emoji emoji1f62d" onclick="writeEmote('😭', '{{ $class_subject->id}}')" data-c="😭">😭</li>
                    <li role="button" class="emoji emoji1f929" onclick="writeEmote('🤩', '{{ $class_subject->id}}')" data-c="🤩">🤩</li>
                    <li role="button" class="emoji emoji1f635" onclick="writeEmote('😵', '{{ $class_subject->id}}')" data-c="😵">😵</li>
                    <li role="button" class="emoji emoji1f974" onclick="writeEmote('🥴', '{{ $class_subject->id}}')" data-c="🥴">🥴</li>
                    <li role="button" class="emoji emoji1f632" onclick="writeEmote('😲', '{{ $class_subject->id}}')" data-c="😲">😲</li>
                    <li role="button" class="emoji emoji1f92f" onclick="writeEmote('🤯', '{{ $class_subject->id}}')" data-c="🤯">🤯</li>
                    <li role="button" class="emoji emoji1f910" onclick="writeEmote('🤐', '{{ $class_subject->id}}')" data-c="🤐">🤐</li>
                    <li role="button" class="emoji emoji1f637" onclick="writeEmote('😷', '{{ $class_subject->id}}')" data-c="😷">😷</li>
                    <li role="button" class="emoji emoji1f915" onclick="writeEmote('🤕', '{{ $class_subject->id}}')" data-c="🤕">🤕</li>
                    <li role="button" class="emoji emoji1f912" onclick="writeEmote('🤒', '{{ $class_subject->id}}')" data-c="🤒">🤒</li>
                    <li role="button" class="emoji emoji1f92e" onclick="writeEmote('🤮', '{{ $class_subject->id}}')" data-c="🤮">🤮</li>
                    <li role="button" class="emoji emoji1f922" onclick="writeEmote('🤢', '{{ $class_subject->id}}')" data-c="🤢">🤢</li>
                    <li role="button" class="emoji emoji1f927" onclick="writeEmote('🤧', '{{ $class_subject->id}}')" data-c="🤧">🤧</li>
                    <li role="button" class="emoji emoji1f975" onclick="writeEmote('🥵', '{{ $class_subject->id}}')" data-c="🥵">🥵</li>
                    <li role="button" class="emoji emoji1f976" onclick="writeEmote('🥶', '{{ $class_subject->id}}')" data-c="🥶">🥶</li>
                    <li role="button" class="emoji emoji1f634" onclick="writeEmote('😴', '{{ $class_subject->id}}')" data-c="😴">😴</li>
                    <li role="button" class="emoji emoji1f4a4" onclick="writeEmote('💤', '{{ $class_subject->id}}')" data-c="💤">💤</li>
                    <li role="button" class="emoji emoji1f608" onclick="writeEmote('😈', '{{ $class_subject->id}}')" data-c="😈">😈</li>
                    <li role="button" class="emoji emoji1f47f" onclick="writeEmote('👿', '{{ $class_subject->id}}')" data-c="👿">👿</li>
                    <li role="button" class="emoji emoji1f479" onclick="writeEmote('👹', '{{ $class_subject->id}}')" data-c="👹">👹</li>
                    <li role="button" class="emoji emoji1f47a" onclick="writeEmote('👺', '{{ $class_subject->id}}')" data-c="👺">👺</li>
                    <li role="button" class="emoji emoji1f4a9" onclick="writeEmote('💩', '{{ $class_subject->id}}')" data-c="💩">💩</li>
                    <li role="button" class="emoji emoji1f47b" onclick="writeEmote('👻', '{{ $class_subject->id}}')" data-c="👻">👻</li>
                    <li role="button" class="emoji emoji1f480" onclick="writeEmote('💀', '{{ $class_subject->id}}')" data-c="💀">💀</li>
                    <li role="button" class="emoji emoji1f47d" onclick="writeEmote('👽', '{{ $class_subject->id}}')" data-c="👽">👽</li>
                    <li role="button" class="emoji emoji1f916" onclick="writeEmote('🤖', '{{ $class_subject->id}}')" data-c="🤖">🤖</li>
                    <li role="button" class="emoji emoji1f383" onclick="writeEmote('🎃', '{{ $class_subject->id}}')" data-c="🎃">🎃</li>
                    <li role="button" class="emoji emoji1f63a" onclick="writeEmote('😺', '{{ $class_subject->id}}')" data-c="😺">😺</li>
                    <li role="button" class="emoji emoji1f638" onclick="writeEmote('😸', '{{ $class_subject->id}}')" data-c="😸">😸</li>
                    <li role="button" class="emoji emoji1f639" onclick="writeEmote('😹', '{{ $class_subject->id}}')" data-c="😹">😹</li>
                    <li role="button" class="emoji emoji1f63b" onclick="writeEmote('😻', '{{ $class_subject->id}}')" data-c="😻">😻</li>
                    <li role="button" class="emoji emoji1f63c" onclick="writeEmote('😼', '{{ $class_subject->id}}')" data-c="😼">😼</li>
                    <li role="button" class="emoji emoji1f63d" onclick="writeEmote('😽', '{{ $class_subject->id}}')" data-c="😽">😽</li>
                    <li role="button" class="emoji emoji1f640" onclick="writeEmote('🙀', '{{ $class_subject->id}}')" data-c="🙀">🙀</li>
                    <li role="button" class="emoji emoji1f63f" onclick="writeEmote('😿', '{{ $class_subject->id}}')" data-c="😿">😿</li>
                    <li role="button" class="emoji emoji1f63e" onclick="writeEmote('😾', '{{ $class_subject->id}}')" data-c="😾">😾</li>
                    <li role="button" class="emoji emoji1f450" onclick="writeEmote('👐', '{{ $class_subject->id}}')" data-c="👐">👐</li>
                    <li role="button" class="emoji emoji1f932" onclick="writeEmote('🤲', '{{ $class_subject->id}}')" data-c="🤲">🤲</li>
                    <li role="button" class="emoji emoji1f64c" onclick="writeEmote('🙌', '{{ $class_subject->id}}')" data-c="🙌">🙌</li>
                    <li role="button" class="emoji emoji1f44f" onclick="writeEmote('👏', '{{ $class_subject->id}}')" data-c="👏">👏</li>
                    <li role="button" class="emoji emoji1f64f" onclick="writeEmote('🙏', '{{ $class_subject->id}}')" data-c="🙏">🙏</li>
                    <li role="button" class="emoji emoji1f91d" onclick="writeEmote('🤝', '{{ $class_subject->id}}')" data-c="🤝">🤝</li>
                    <li role="button" class="emoji emoji1f44d" onclick="writeEmote('👍', '{{ $class_subject->id}}')" data-c="👍">👍</li>
                    <li role="button" class="emoji emoji1f44e" onclick="writeEmote('👎', '{{ $class_subject->id}}')" data-c="👎">👎</li>
                    <li role="button" class="emoji emoji1f44a" onclick="writeEmote('👊', '{{ $class_subject->id}}')" data-c="👊">👊</li>
                    <li role="button" class="emoji emoji1f91b" onclick="writeEmote('🤛', '{{ $class_subject->id}}')" data-c="🤛">🤛</li>
                    <li role="button" class="emoji emoji1f91c" onclick="writeEmote('🤜', '{{ $class_subject->id}}')" data-c="🤜">🤜</li>
                    <li role="button" class="emoji emoji1f91e" onclick="writeEmote('🤞', '{{ $class_subject->id}}')" data-c="🤞">🤞</li>
                    <li role="button" class="emoji emoji1f918" onclick="writeEmote('🤘', '{{ $class_subject->id}}')" data-c="🤘">🤘</li>
                    <li role="button" class="emoji emoji1f91f" onclick="writeEmote('🤟', '{{ $class_subject->id}}')" data-c="🤟">🤟</li>
                    <li role="button" class="emoji emoji1f44c" onclick="writeEmote('👌', '{{ $class_subject->id}}')" data-c="👌">👌</li>
                    <li role="button" class="emoji emoji1f90f" onclick="writeEmote('🤏', '{{ $class_subject->id}}')" data-c="🤏">🤏</li>
                    <li role="button" class="emoji emoji1f448" onclick="writeEmote('👈', '{{ $class_subject->id}}')" data-c="👈">👈</li>
                    <li role="button" class="emoji emoji1f449" onclick="writeEmote('👉', '{{ $class_subject->id}}')" data-c="👉">👉</li>
                    <li role="button" class="emoji emoji1f446" onclick="writeEmote('👆', '{{ $class_subject->id}}')" data-c="👆">👆</li>
                    <li role="button" class="emoji emoji1f447" onclick="writeEmote('👇', '{{ $class_subject->id}}')" data-c="👇">👇</li>
                    <li role="button" class="emoji emoji1f91a" onclick="writeEmote('🤚', '{{ $class_subject->id}}')" data-c="🤚">🤚</li>
                    <li role="button" class="emoji emoji1f590" onclick="writeEmote('🖐', '{{ $class_subject->id}}')" data-c="🖐">🖐</li>
                    <li role="button" class="emoji emoji1f596" onclick="writeEmote('🖖', '{{ $class_subject->id}}')" data-c="🖖">🖖</li>
                    <li role="button" class="emoji emoji1f44b" onclick="writeEmote('👋', '{{ $class_subject->id}}')" data-c="👋">👋</li>
                    <li role="button" class="emoji emoji1f919" onclick="writeEmote('🤙', '{{ $class_subject->id}}')" data-c="🤙">🤙</li>
                    <li role="button" class="emoji emoji1f4aa" onclick="writeEmote('💪', '{{ $class_subject->id}}')" data-c="💪">💪</li>
                    <li role="button" class="emoji emoji1f9be" onclick="writeEmote('🦾', '{{ $class_subject->id}}')" data-c="🦾">🦾</li>
                    <li role="button" class="emoji emoji1f595" onclick="writeEmote('🖕', '{{ $class_subject->id}}')" data-c="🖕">🖕</li>
                </ul>

            </dropdown>

        </ul>
    </div>
</div>