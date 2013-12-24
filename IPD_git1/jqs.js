// JavaScript Document

$(selector).timeEntry({ 
    show24Hours:true, // True to use 24 hour time, false for 12 hour (AM/PM) 
    separator: ':', // The separator between time fields 
    ampmPrefix: '', // The separator before the AM/PM text 
    ampmNames: ['', ''], // Names of morning/evening markers 
    // The <a href="http://www.jqueryscript.net/tags.php?/popup/">popup</a> texts for the spinner image areas 
    spinnerTexts: ['Now', 'Previous field', 'Next field', 'Increment', 'Decrement'], 
      
    appendText: '', // Display text following the input box, e.g. showing the format 
    showSeconds: false, // True to show seconds as well, false for hours/minutes only 
    timeSteps: [1, 1, 1], // Steps for each of hours/minutes/seconds when incrementing/decrementing 
    initialField: 0, // The field to highlight initially, 0 = hours, 1 = minutes, ... 
    noSeparatorEntry: false, // True to move to next sub-field after two digits entry 
    useMouseWheel: true, // True to use mouse wheel for increment/decrement if possible, 
        // false to never use it 
    defaultTime: null, // The time to use if none has been set, leave at null for now 
    minTime: null, // The earliest selectable time, or null for no limit 
    maxTime: null, // The latest selectable time, or null for no limit 
    spinnerImage: 'spinnerDefault.png', // The URL of the images to use for the time spinner 
        // Seven images packed horizontally for normal, each button pressed, and disabled 
    spinnerSize: [20, 20, 8], // The width and height of the spinner image, 
        // and size of centre button for current time 
    spinnerBigImage: '', // The URL of the images to use for the expanded time spinner 
        // Seven images packed horizontally for normal, each button pressed, and disabled 
    spinnerBigSize: [40, 40, 16], // The width and height of the expanded spinner image, 
        // and size of centre button for current time 
    spinnerIncDecOnly: false, // True for increment/decrement buttons only, false for all 
    spinnerRepeat: [500, 250], // Initial and subsequent waits in milliseconds 
        // for repeats on the spinner buttons 
    beforeShow: null, // Function that takes an input field and 
        // returns a set of custom settings for the time entry 
    beforeSetTime: null // Function that runs before updating the time, 
        // takes the old and new times, and minimum and maximum times as parameters, 
        // and returns an adjusted time if necessary 
}); 
  
$.timeEntry.setDefaults(settings) // Set default values for all instances 
  
$(selector).timeEntry('option', settings) // Change the settings for selected instances 
$(selector).timeEntry('option', name, value) // Change a single setting for selected instances 
$(selector).timeEntry('option', name) // Retrieve a setting value 
  
$(selector).timeEntry('destroy') // Remove the time entry functionality 
  
$(selector).timeEntry('disable') // Disable time entry 
  
$(selector).timeEntry('enable') // Enable time entry 
  
$(selector).timeEntry('isDisabled') // Determine if field is disabled 
  
$(selector).timeEntry('setTime', time) // Set the time for the instance 
  
$(selector).timeEntry('getTime') // Retrieve the currently selected time 
  
$(selector).timeEntry('getOffset') // Retrieve the current time offset