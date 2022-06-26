class Timer {
    constructor(targetedElement, durationInSeconds, endCallback, playButtonContent, pauseButtonContent,
                resetButtonContent, skipButtonContent, ) {

        targetedElement.innerHTML = Timer.getHTML();

        this.controls = {
            progress: targetedElement.querySelector('.progress'),
            control: targetedElement.querySelector('#timer-control'),
            reset: targetedElement.querySelector('#timer-reset'),
            skip: targetedElement.querySelector('#timer-skip'),
        };

        this.controls.control.innerHTML = playButtonContent;
        this.playButtonContent = playButtonContent;
        this.pauseButtonContent = pauseButtonContent;

        this.controls.reset.innerHTML = resetButtonContent;
        this.resetButtonContent = resetButtonContent;

        this.controls.skip.innerHTML = skipButtonContent;
        this.skipButtonContent = skipButtonContent;

        this.interval = null;
        this.remainingSeconds = durationInSeconds;
        this.totalDurationInSeconds = durationInSeconds;
        this.oneSecondPercentage = 100 / this.totalDurationInSeconds;
        this.currentPercentage = 0;

        this.endCallback = () => {
            this.beep(100,800,300);
            endCallback();
        }

        this.controls.control.addEvent('click', () => {
            if (this.interval === null) {
                this.start();
            }
            else {
                this.stop();
            }
        });

        this.controls.reset.addEvent('click', () => {
            this.remainingSeconds = this.totalDurationInSeconds;
            this.currentPercentage = 0;
            this.updateInterfaceTime();
            this.stop();
        });

        this.controls.skip.addEvent('click', () => {
            this.remainingSeconds = 0;
            this.currentPercentage = 100;
            this.updateInterfaceTime();

            if (this.interval === null) {
                this.endCallback();
            }
        });
    }

    updateInterfaceTime() {
        this.controls.progress.innerHTML = '';
        let htmlString = `<div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                          role="progressbar" aria-valuenow="${this.currentPercentage}" aria-valuemin="0" aria-valuemax="100"
                          style="width: ${this.currentPercentage}%"></div>
                       </div>`;
        let docElement = createElementFromHTML(htmlString);
        this.controls.progress.appendChild(docElement);
    }

    updateInterfaceControls() {
        if (this.interval === null) {
            this.controls.control.innerHTML = this.playButtonContent;
            this.controls.control.addClass("timer-start");
            this.controls.control.removeClass("timer-stop");
        }
        else {
            this.controls.control.innerHTML = this.pauseButtonContent;
            this.controls.control.addClass("timer-stop");
            this.controls.control.removeClass("timer-start");
        }
    }

    start() {
        if (this.remainingSeconds <= 0) {
            this.endCallback();
            return;
        }

        this.interval = setInterval(() => {
            this.remainingSeconds--;
            this.currentPercentage += this.oneSecondPercentage;
            if ([1, 2, 3].include(this.remainingSeconds)) {
                this.beep(20,690,80);
            }
            this.updateInterfaceTime();

            if (this.remainingSeconds <= 0) {
                this.stop();
                this.endCallback();
            }
        }, 1000);

        this.updateInterfaceControls();
    }

    stop() {
        clearInterval(this.interval);
        this.interval = null;

        this.updateInterfaceControls();
    }

    static getHTML() {
        return `
			<div class="progress-line progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-0" 
                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div>
                <button type="button" class="timer-button" id="timer-control"></button>
                <button type="button" class="timer-button" id="timer-reset"></button>
                <button type="button" class="timer-button" id="timer-skip"></button>
            </div>
		`;
    }

    beep(vol, freq, duration){
        const audioContext=new AudioContext();

        let v = audioContext.createOscillator()
        let u = audioContext.createGain()
        v.connect(u)
        v.frequency.value=freq
        v.type="square"
        u.connect(audioContext.destination)
        u.gain.value = vol*0.01
        v.start(audioContext.currentTime)
        v.stop(audioContext.currentTime+duration*0.001)
    }
}