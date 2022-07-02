<div class="screen" id="main_login_screen">
    @push('styles')
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    @endpush

{{--    <p class="boot-screen" id="boot_screen"></p>--}}
    <div class="screen-reflection"></div>
    <div class="scan"></div>

    <div class="loaded-draw" id="loaded_holder">
        <div class="text" id="loaded_text">

        </div>
    </div>

    <div class="login-screen hidden" id="login_screen">
        <div class="form-holder">
            <form wire:submit.prevent="registerOrLogin">
                <input class="username-input" wire:model.lazy="username" type="text" placeholder="{{__('Input your name here')}}">
                <button class="login-button" type="submit">{{__('LAUNCH')}}</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            var isRunning = false;
            var loadedScreen = document.getElementById('loaded_text');

            //trigger on landscape
            window.addEventListener("orientationchange", function() {
                if(!isRunning){
                    generateLoadedScreen();
                    isRunning = true;

                    var bootScreen = document.getElementById('boot_screen');
                    bootScreen.innerText = generateBootScreen();
                    setTimeout(function () {
                        bootScreen.style.display = 'none';
                    }, 8000);

                }
            }, isRunning);

            if(window.innerHeight < window.innerWidth && !isRunning){
                generateLoadedScreen();
                var bootScreen = document.getElementById('boot_screen');
                bootScreen.innerText = generateBootScreen();
                setTimeout(function () {
                    bootScreen.style.display = 'none';
                }, 8000);

                isRunning = true;
            }
            //end trigger on landscape

            function generateLoadedScreen() {
                var mainScreen = document.getElementById('main_login_screen')
                var p = document.createElement('p');
                var child = mainScreen.appendChild(p);
                child.classList.add('boot-screen');
                child.id = 'boot_screen';

                var timeoutStart = 9000;
                drawLine('^^^^^^^^^^^^^^^ PIP-OS(R) V7.1.0.8 ^^^^^^^^^^^^^^^^', timeoutStart)

                timeoutStart = 12000;

                setTimeout(function (timeoutStart) {
                    timeoutStart += 50;
                    drawLine('\n', timeoutStart)
                    timeoutStart += 50;
                    drawLine('\n', timeoutStart)
                    timeoutStart += 50;
                    drawLine('\n', timeoutStart)
                    timeoutStart += 50;
                    drawLine('\n', timeoutStart)

                    timeoutStart += 3000;

                    setTimeout(function () {
                        drawLine('COPYRIGHT 2075 ROBCO(R)', 0)

                        setTimeout(function () {
                            drawLine('LOADER V1.1', 0)

                            setTimeout(function () {
                                drawLine('EXEC VERSION 41.10', 0)

                                setTimeout(function () {
                                    drawLine('64k RAM SYSTEM', 0)

                                    setTimeout(function () {
                                        drawLine('38911 BYTES FREE', 0)

                                        setTimeout(function () {
                                            drawLine('NO HOLOTAPE FOUND', 0)

                                            setTimeout(function () {
                                                drawLine('LOAD ROM(1): DEITRIX 303', 0)

                                                setTimeout(function () {
                                                    loadedScreen.style.display='none';
                                                    document.getElementById('login_screen').classList.remove('hidden');
                                                    document.getElementById('login_screen').classList.add('fade-in');
                                                    document.getElementById('loaded_holder').classList.remove('loaded-draw');
                                                }, 5000);
                                            }, 1500)
                                        }, 1500)
                                    }, 1500)
                                }, 1500)
                            }, 1500)
                        }, 1500)
                    }, timeoutStart)
                }, timeoutStart, timeoutStart)
            }

            function drawLine(line, timeoutStart) {
                var div = document.createElement('div');
                var child = loadedScreen.appendChild(div);

                for (i = 0; i < line.length; i++) {
                    timeoutStart = timeoutStart + 50
                    setTimeout(function (line, i, child) {
                        var prevText = child.innerText;

                        if (!prevText || prevText == 'UNDEFINED') {
                            prevText = '';
                        }
                        if (line[i] == ' ') {
                            child.innerHTML = prevText + ' ' + line[i + 1];
                        } else if (line[i - 1] == ' ') {

                        } else {
                            child.innerText = prevText + line[i];
                        }
                    }, timeoutStart, line, i, child);
                }
            }

            function generateBootScreen() {
                var text = '';
                var phase = 0;
                var pollute = 0;

                for (var i = 0; i < 40; i++) {
                    text = text + '\n';
                }

                for (var i = 0; i < 100; i++) {
                    text = text + generateMemoryIndex(17);

                    if (phase == 0) {
                        text = text + ' CPUD launch EFI0 ' + generateMemoryIndex(6) + ' ';
                        phase++;
                    }

                    if (phase == 1 && pollute % 3 == 1) {
                        text = text + ' start memory discovery ' + generateMemoryIndex(6) + ' ';
                        text = text + generateMemoryIndex(6) + ' ';
                        text = text + generateMemoryIndex(6) + ' ';
                        if (pollute % 3 == 0 || pollute % 4 == 0) {
                            text = text + generateMemoryIndex(6) + ' ';
                            text = text + ' 0 1 ';
                            pollute++;
                        }
                        phase++;
                    }

                    if (phase == 2) {
                        text = text + ' CPUD starting cell relocation ' + generateMemoryIndex(6) + ' ';
                        if (pollute % 5 == 0) {
                            text = text + generateMemoryIndex(6) + ' ';
                            pollute++;
                        }
                        phase = 0;
                    }

                    pollute++;

                }

                return text;
            }

            function generateMemoryIndex(len) {
                var index = '0x';

                for (var i = 0; i < len - 2; i++) {
                    index = index + 0;
                }

                index = index + makeid(2);

                return index;
            }

            function makeid(length) {
                var result = '';
                var characters = 'ABCDEF0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() *
                        charactersLength));
                }
                return result;
            }
        </script>
    @endpush
</div>
