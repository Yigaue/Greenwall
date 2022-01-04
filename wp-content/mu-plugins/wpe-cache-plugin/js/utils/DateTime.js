'use strict';
import Time from './Time';

class DateTime {
    static getDateTimeUTC(date) {
        return date.getTime() + Time.minutes(date.getTimezoneOffset());
    }

    static getLocalDateTimeFromUTC(date) {
        const newDate = new Date(
            date.getTime() + Time.minutes(date.getTimezoneOffset())
        );
        const offset = date.getTimezoneOffset() / 60;
        const hours = date.getHours();
        newDate.setHours(hours - offset);
        return newDate;
    }

    static formatDate(date, locale = window.navigator.language || 'en-US') {
        const localOptions = {
            dateStyle: 'medium',
            timeStyle: 'short',
        };
        return `${new Intl.DateTimeFormat(locale, localOptions).format(
            date
        )} UTC`;
    }

    static isLastClearedExpired(lastClearedAt, threshold = Time.minutes(5)) {
        const lastClearedAtDate = new Date(Date.parse(lastClearedAt));
        if (!this.isValidDate(lastClearedAtDate)) {
            console.warn(`Invalid date: ${lastClearedAt}`);
            return true;
        }
        const now = DateTime.getDateTimeUTC(new Date(Date.now()));
        return now - lastClearedAtDate.getTime() > threshold;
    }

    static isValidDate(d) {
        return d instanceof Date && !Number.isNaN(d.getTime());
    }
}

export default DateTime;
