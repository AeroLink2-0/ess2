!function(t,e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],function(t){return e(t,window,document)}):"object"==typeof exports?module.exports=function(t,i){return t||(t=window),i||(i="undefined"!=typeof window?require("jquery"):require("jquery")(t)),e(i,t,t.document)}:e(jQuery,window,document)}(0,function(t,e,i){"use strict";var s={data:[],final:"Are you sure you want to confirm?",finalLabel:"Complete",title:"",prevText:"Previous",skipText:"Skip",nextText:"Next",finishText:"Finish",modalSize:"md",onClose:function(){},onDestroy:function(t){}},n=function(e,i){this.element=e,this.options=t.extend({},s,i),this.destroy=function(){this.element.html("");var t=this.element.attr("data-id");this.element.attr("id",t),this.element.removeAttr("data-id").removeAttr("class").removeAttr("tabindex").removeAttr("role").removeAttr("aria-labelledby").removeAttr("aria-hidden"),this._onDestroy()},this.init()};function a(){return([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g,t=>(t^crypto.getRandomValues(new Uint8Array(1))[0]&15>>t/4).toString(16))}n.prototype={constructor:n,init:function(){this._buildModal(),this._buildMultiStep()},update:function(e){this.options=t.extend({},this.options,e),this.init()},_buildMultiStep:function(){var t=this.element,e=t.attr("id");e&&""!=e.trim()||(e=a(),t.attr("id",e)),this.id=e,t.addClass("multi-step");var i=t.find(".modal-header");this.header=i,i.append('<div class="modal-steps"></div>');var s=i.find(".modal-steps");this.modalSteps=s;var n=t.find(".modal-body");this.body=n;var o=t.find(".modal-footer");this.footer=o,this._buildDataContent(),this._buildFooterContent(),this._attachEvents(),this._initialModal()},_buildModal:function(){var t=this.element.attr("id"),e=t;this.options.id&&(t=this.options.id),t||(t=a()),this.element.attr("id",t).attr("data-id",e).attr("class","modal fade").attr("tabindex","-1").attr("role","dialog").attr("aria-labelledby",`${t}Title`).attr("aria-hidden","true"),this.element.html(`<div class="modal-dialog modal-dialog-centered modal-${this.options.modalSize} multi-step" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="${t}LongTitle">${this.options.title}</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"></div><div class="modal-footer"></div></div></div>`);var i=this;this.element.on("hide.bs.modal",function(){i._initialModal(),i._onClose()}).on("hidden.bs.modal",function(){i._initialModal(),i._onClose()})},_onClose:function(){"function"==typeof this.options.onClose&&this.options.onClose(this.element)},_onDestroy:function(){"function"==typeof this.options.onDestroy&&this.options.onDestroy()},_buildDataContent:function(){var t=this.options.data;if(t&&t.length>0){var e="",i="";for(var s in this.data=t,this.stepsCount=t.length,t){var n=Number(s)+1,a=t[s].label?t[s].label:`Step ${n}`;e+=`<div class="step" data-step="${n}" data-step-skip=${1==t[s].skip}>\n                                <div class="dot"></div>\n                                <label class="label">${a}</label>\n                                </div>`,i+=`<div class="step-content" data-step="${n}" data-step-skip=${1==t[s].skip}>\n                                       <div class="content-inner">${t[s].content}</div>\n                                       </div>`}e+=`<div class="step" data-step="${t.length+1}" data-step-skip=false>\n                                <div class="dot"></div>\n                                <label class="label">${this.options.finalLabel}</label>\n                                </div>`,i+=`<div class="step-content" data-step="${t.length+1}" data-step-skip=false>\n                                       <div class="content-inner">${this.options.final}</div>\n                                       </div>`,this.modalSteps.html(e),i=`<div class="step-content-container">${i}</div>`,this.body.html(i),this.stepContentContainer=this.body.find(".step-content-container")}},_buildFooterContent:function(){var t=`<button type="button" class="btn btn-sm btn-prev">${this.options.prevText}</button>\n            <button type="button" class="btn btn-sm btn-skip">${this.options.skipText}</button>\n            <button type="button" class="btn btn-sm btn-next">${this.options.nextText}</button>`;this.footer.html(t),this.prev=this.footer.find(".btn-prev"),this.skip=this.footer.find(".btn-skip"),this.next=this.footer.find(".btn-next")},_attachEvents:function(){this._attachPrevEvent(),this._attachSkipEvent(),this._attachNextEvent()},_attachPrevEvent:function(){var t=this;t.prev.click(function(){t.next.text(t.options.nextText);var e=t.currentStepIdx-1;e<=1?(e=1,t.prev.addClass("disabled").attr("disabled","disabled")):t.prev.removeClass("disabled").removeAttr("disabled"),t._currentStep(e),t._checkSkip(),t._showContent(e)})},_checkSkip:function(){"true"==this.modalSteps.find(".current").attr("data-step-skip")?this.skip.addClass("skippable"):this.skip.removeClass("skippable")},_attachSkipEvent:function(){var t=this;t.skip.click(function(){var e=t.currentStepIdx;e+1<=1?t.prev.addClass("disabled").attr("disabled","disabled"):t.prev.removeClass("disabled").removeAttr("disabled"),t._skipStep(e),t._showContent(e+1)})},_attachNextEvent:function(){var t=this;t.next.click(function(){var e=t.currentStepIdx;e>=t.stepsCount+1?t.element.modal("hide"):(e>=t.stepsCount?t.next.text(t.options.finishText):t.next.text(t.options.nextText),e+1<=1?t.prev.addClass("disabled").attr("disabled","disabled"):t.prev.removeClass("disabled").removeAttr("disabled"),t._completeStep(e),t._showContent(e+1))})},_currentStep:function(t){var e=this.modalSteps.find("[data-step]").length;this._recursiveCurrentStep(t,e),this.currentStepIdx=t},_showContent:function(t){this.stepContentContainer&&(this.stepContentContainer.find(".step-content").removeClass("active"),this.stepContentContainer.find(`[data-step="${t}"]`).addClass("active"))},_recursiveCurrentStep:function(t,e){if(!(e<1)){var i=this.modalSteps.find(`[data-step="${e}"]`),s=this;t==e?(i.removeClasses(["completed","skipped"]).addClass("current"),s._checkSkip()):i.hasAnyClass(["completed","current","skipped"])?(i.removeClasses(["completed","current","skipped"]),setTimeout(function(){s._recursiveCurrentStep(t,--e)},200)):s._recursiveCurrentStep(t,--e)}},_completeStep:function(t){var e=this;this.modalSteps.find(`[data-step="${t}"]`).addClass("completed").removeClasses(["current","skipped"]),setTimeout(function(){e.modalSteps.find(`[data-step="${Number(t)+1}"]`).addClass("current"),e.currentStepIdx=Number(t)+1,e._checkSkip()},200)},_skipStep:function(t){var e=this;this.modalSteps.find(`[data-step="${t}"]`).addClass("skipped").removeClasses(["current","completed"]),setTimeout(function(){e.modalSteps.find(`[data-step="${Number(t)+1}"]`).addClass("current"),e.currentStepIdx=Number(t)+1,e._checkSkip()},200)},_initialModal:function(){this._currentStep(1),this.prev.addClass("disabled").attr("disabled","disabled"),this._checkSkip(),this._showContent(1),this.next.text(this.options.nextText)}},t.fn.MultiStep=function(e,i){return"object"==typeof e&&(e=t.extend(!0,{},s,e)),this.each(function(){var s=t(this);if(s.data("multiStep")||e&&"object"!=typeof e){if(s.data("multiStep"))if("string"==typeof e){var a=e,o=i;s.data("multiStep")[a].call(o)}else s.data("multiStep").update(e)}else s.data("multiStep",new n(s,e))}),"function"==typeof i&&i.call(this.element),this},t.fn.MultiStep.defaults=s,t.fn.MultiStep.multiStep=n,t(document).ready(function(){t(".multi-step").MultiStep()})}),$.fn.removeClasses=function(t){"string"==typeof t&&(t=[t]);for(var e=t.length-1;e>=0;e--){var i=t[e];this.removeClass(i)}return this},$.fn.addClasses=function(t){"string"==typeof t&&(t=[t]);for(var e=t.length-1;e>=0;e--){var i=t[e];this.addClass(i)}return this},$.fn.hasAnyClass=function(t){"string"==typeof t&&(t=[t]);for(var e=t.length-1;e>=0;e--){var i=t[e];if(this.hasClass(i))return!0}return!1};