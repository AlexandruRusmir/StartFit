class Timer {
    constructor(root, durationInSeconds, endCallback, playButtonContent, pauseButtonContent, resetButtonContent,
                skipButtonContent) {
        root.innerHTML = Timer.getHTML();

        this.el = {
            progress: root.querySelector('.progress'),
            control: root.querySelector('.timer__btn--control'),
            reset: root.querySelector('.timer__btn--reset'),
            skip: root.querySelector('.timer__btn--skip'),
        };

        this.el.control.innerHTML = playButtonContent;
        this.playButtonContent = playButtonContent;
        this.pauseButtonContent = pauseButtonContent;

        this.el.reset.innerHTML = resetButtonContent;
        this.resetButtonContent = resetButtonContent;

        this.el.skip.innerHTML = skipButtonContent;
        this.skipButtonContent = skipButtonContent;

        this.interval = null;
        this.remainingSeconds = durationInSeconds;
        this.totalDurationInSeconds = durationInSeconds;
        this.oneSecondPercentage = 100 / this.totalDurationInSeconds;
        this.currentPercentage = 0;

        this.endCallback = endCallback;

        this.el.control.addEvent('click', () => {
            if (this.interval === null) {
                this.start();
            } else {
                this.stop();
            }
        });

        this.el.reset.addEvent('click', () => {
            this.remainingSeconds = this.totalDurationInSeconds;
            this.currentPercentage = 0;
            this.updateInterfaceTime();
            this.stop();
        });

        this.el.skip.addEvent('click', () => {
            this.remainingSeconds = 0;
            this.currentPercentage = 100;
            this.updateInterfaceTime();

            if(this.interval === null) {
                this.endCallback();
            }
        });
    }

    updateInterfaceTime() {
        this.el.progress.innerHTML='';
        let htmlString = `<div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                          role="progressbar" aria-valuenow="${this.currentPercentage}" aria-valuemin="0" aria-valuemax="100"
                          style="width: ${this.currentPercentage}%"></div>
                       </div>`;
        let docElement = createElementFromHTML(htmlString);
        this.el.progress.appendChild(docElement);
    }

    updateInterfaceControls() {
        if (this.interval === null) {
            this.el.control.innerHTML = this.playButtonContent;
            this.el.control.classList.add("timer__btn--start");
            this.el.control.classList.remove("timer__btn--stop");
        } else {
            this.el.control.innerHTML = this.pauseButtonContent;
            this.el.control.classList.add("timer__btn--stop");
            this.el.control.classList.remove("timer__btn--start");
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
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-0" 
                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
			<button type="button" class="timer-btn timer__btn--control timer__btn--start"></button>
			<button type="button" class="timer-btn timer__btn--reset"></button>
			<button type="button" class="timer-btn timer__btn--skip"></button>
		`;
    }
}