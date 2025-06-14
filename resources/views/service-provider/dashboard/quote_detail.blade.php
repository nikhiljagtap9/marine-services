@extends('service-provider.dashboard.main')

@section('content')
<style type="text/css">
   a.quot_activ {
      color: #083a76;
      background-color: rgb(8 58 118 / 9%);
      -webkit-box-shadow: none;
      box-shadow: none;
      border-color: #083a76;
      border-left: 4px solid #083a76 !important;
   }
</style>
<div class="body-content">
   <div class="decoration blur-2"></div>
   <div class="decoration blur-3"></div>
   <div class="container-xxl">
      <div class="chat-container m-0 overflow-hidden position-relative rounded-4 row">

         <div class="tab-content chat-panel p-0">

            <div class="tab-pane show active" id="list-item2" role="tabpanel" aria-labelledby="list-item2-tab">

               <div class="messenger-dialog row m-0">
                  <div class="messenger-dialog__area p-0">
                     <div class="conversation-search">
                        <div class="d-flex">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
                                 </svg>
                              </button>
                              <button type="button" class="btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                                 </svg>
                              </button>
                           </div>
                           <div class="input-group">
                              <div class="search__icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                 </svg>
                              </div>
                              <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon4">
                              <button class="btn btn-outline-secondary close-search" type="button" id="button-addon4">Cancel</button>
                           </div>
                        </div>
                     </div>
                     <!-- /.conversation search -->
                     <div id="chatContainer" class="message-content message-content-scroll bg-text-green">
                        <div class="position-relative">
                           @php
                              use Carbon\Carbon;
                              $lastDate = null;
                           @endphp
                          
                          @if (!empty($chatMessages))

                           @foreach ($chatMessages as $msg)
                              @php
                                 $date = Carbon::parse($msg['timestamp'])->format('Y-m-d');
                                 $today = Carbon::today()->format('Y-m-d');
                                 $yesterday = Carbon::yesterday()->format('Y-m-d');
                              @endphp

                           @if ($lastDate !== $date)
                              @php $lastDate = $date; @endphp
                              <div class="date">
                                    <hr>
                                    <span>
                                       @if ($date === $today)
                                          Today
                                       @elseif ($date === $yesterday)
                                          Yesterday
                                       @else
                                          {{ Carbon::parse($msg['timestamp'])->format('d M Y') }}
                                       @endif
                                    </span>
                                    <hr>
                              </div>
                           @endif   

                           
                           <div class="message {{ $msg['sender_id'] == $authId ? 'me' : '' }}">
                              @if($msg['sender_id'] != $authId)
                              <!-- <img class="avatar" src="{{ $msg['sender_avatar'] ?? asset('assets/dist/img/avatar/01.jpg') }}" alt="avatar"> -->
                              @endif
                              <div class="text-main">
                                 <span class="time-ago">{{ \Carbon\Carbon::parse($msg['timestamp'])->format('h:i A') }}</span>

                              {{-- Attachment case --}}
                              @if(!empty($msg['attachments']) && is_array($msg['attachments']))
                                 @foreach ($msg['attachments'] as $file)
                                    <div class="text-group {{ $msg['sender_id'] == $authId ? 'me' : '' }}">
                                          <div class="text {{ $msg['sender_id'] == $authId ? 'me' : '' }}">
                                             <div class="align-items-center attachment d-flex gap-2">
                                                <a href="{{ asset('storage/' . $file['file_path']) }}" target="_blank" class="align-items-center attach btn btn-primary d-flex justify-content-center p-0">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-hdd" viewBox="0 0 16 16">
                                                         <path d="M4.5 11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5zM11 11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5z"/>
                                                         <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 3H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V6z"/>
                                                      </svg>
                                                </a>
                                                <div class="file">
                                                      <h5>
                                                         <a href="{{ asset('storage/' . $file['file_path']) }}" target="_blank">
                                                            {{ $file['file_name'] }}
                                                         </a>
                                                      </h5>
                                                      <span>{{ ucfirst($file['type']) }} File ({{ $file['size'] }})</span>
                                                </div>
                                             </div>
                                          </div>
                                    </div>
                                 @endforeach
                              @endif


                                 {{-- Text message case --}}
                                 @if(!empty($msg['message']))
                                 <div class="text-group {{ $msg['sender_id'] == $authId ? 'me' : '' }}">
                                    <div class="text {{ $msg['sender_id'] == $authId ? 'me' : '' }}">
                                       <p>{{ $msg['message'] }}</p>
                                    </div>
                                 </div>
                                 @endif
                              </div>
                           </div>
                           @endforeach

                           @else
                           <div class="text-muted text-center py-4">No messages yet.</div>
                           @endif
                        </div>
                     </div>

                     <div class="chat-area-bottom d-flex align-items-center">
                        <!-- <form id="chatForm" class="position-relative w-100" enctype="multipart/form-data">
                           <button type="submit" class="align-items-center btn d-flex start-0 justify-content-center p-0 position-absolute send top-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                 <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5" />
                              </svg>
                           </button>
                           <textarea class="form-control" placeholder="Type a message here..." rows="1"></textarea>
                           <button type="submit" class="align-items-center btn d-flex end-0 justify-content-center p-0 position-absolute send top-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                 <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                              </svg>
                           </button>
                        </form>
                        <label>
                           <input type="file">
                           <span class="align-items-center attach btn btn-primary d-flex justify-content-center ms-3 p-0 rounded-circle text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                 <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z" />
                              </svg>
                           </span>
                        </label> -->
                        <form id="chatForm" class="position-relative w-100" enctype="multipart/form-data">
                           @csrf
                           <div class="align-items-center btn d-flex start-0 justify-content-center p-0 position-absolute send top-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                 <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5" />
                              </svg>
                           </div>
                           <input type="hidden" name="quotation_id" value="{{ $quote->id }}">
                           <textarea class="form-control" id="message" name="message" placeholder="Type a message..." rows="1"></textarea>
                           <small class="text-danger d-block mt-1" id="messageError"></small>
                           <button type="submit" class="align-items-center btn d-flex end-0 justify-content-center p-0 position-absolute send top-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                 <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                              </svg>
                           </button>
                           
                           <label>
                              <input type="file" name="file" class="d-none" id="chatFile" accept=".pdf,.png,.jpg,.jpeg,.doc,.docx">
                              <span class="align-items-center attach btn btn-primary d-flex justify-content-center ms-3 p-0 rounded-circle text-white">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                    <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z" />
                                 </svg>
                              </span>
                           </label>
                        </form>

                     </div>
                     <!--/.chat area bottom-->
                  </div>

                  <!--/.chat list sidebar right-->
               </div>
            </div>


         </div>
         <div class="chat-overlay"></div>
      </div>
      <!--/.chat container-->
   </div>
</div>
@endsection
@section('scripts')
 <script>

   // AJAX Chat Submission
   $('#chatForm').on('submit', function(e) {
      e.preventDefault();
      let formData = new FormData(this);

      // Clear previous error message
      $('#messageError').text('');

      $.ajax({
         url: '{{ route("chat.send") }}',
         method: 'POST',
         data: formData,
         contentType: false,
         processData: false,
         success: function(response) {
            if (response.success) {
               appendMessage(response.message);
               $('#chatForm')[0].reset();
            }
         },
         error: function(xhr) {
            if (xhr.status === 422) {
                const res = xhr.responseJSON;

                if (res.errors?.message) {
                    $('#messageError').text(res.errors.message[0]);
                } else if (res.errors?.file) {
                    $('#messageError').text(res.errors.file[0]);
                } else if (res.error) {
                    // Custom error message like "Either message or file is required."
                    $('#messageError').text(res.error);
                }
            } else {
                $('#messageError').text('Something went wrong. Please try again.');
            }
        }
      });
   });

   function appendMessage(msg) {
        const isMe = msg.sender_id == {{ auth()->id() }};
        const meClass = isMe ? 'me' : '';
        const avatar = isMe ? '' : '';

      //   let attachmentsHtml = '';
      //   if (msg.attachments.length > 0) {
      //       msg.attachments.forEach(file => {
      //           attachmentsHtml += `
      //               <div class="align-items-center attachment d-flex gap-2">
      //                   <a href="/${file.file_path}" target="_blank" class="align-items-center attach btn btn-primary d-flex justify-content-center p-0">
      //                       📎
      //                   </a>
      //                   <div class="file">
      //                       <h5><a href="/${file.file_path}" target="_blank">${file.file_name}</a></h5>
      //                       <span>${file.type.toUpperCase()} File</span>
      //                   </div>
      //               </div>
      //           `;
      //       });
      //   }

      let attachmentsHtml = '';
      if (Array.isArray(msg.attachments) && msg.attachments.length > 0) {
         msg.attachments.forEach(file => {
               attachmentsHtml += `
                  <div class="text-group ${meClass}">
                     <div class="text ${meClass}">
                           <div class="align-items-center attachment d-flex gap-2">
                              <a href="/storage/${file.file_path}" target="_blank" class="align-items-center attach btn btn-primary d-flex justify-content-center p-0">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-hdd" viewBox="0 0 16 16">
                                       <path d="M4.5 11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5zM11 11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5z"/>
                                       <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 3H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V6z"/>
                                 </svg>
                              </a>
                              <div class="file">
                                 <h5>
                                       <a href="/storage/${file.file_path}" target="_blank">${file.file_name}</a>
                                 </h5>
                                 <span>${file.type.charAt(0).toUpperCase() + file.type.slice(1)} File (${file.size})</span>
                              </div>
                           </div>
                     </div>
                  </div>
               `;
         });
      }

        // Then inside your rendering logic:
         const timeFormatted = formatTo12HourTime(msg.timestamp);
        const html = `
            <div class="message ${meClass}">
                ${avatar}
                <div class="text-main">
                    <span class="time-ago">${timeFormatted}</span>
                    ${msg.message ? `
                        <div class="text-group ${meClass}">
                            <div class="text ${meClass}">
                                <p>${msg.message}</p>
                            </div>
                        </div>
                    ` : ''}
                    ${attachmentsHtml}
                </div>
            </div>
        `;

        $('#chatContainer').append(html);
        $('#chatContainer').scrollTop($('#chatContainer')[0].scrollHeight); // Auto scroll to bottom
   }

   function formatTo12HourTime(isoTime) {
      const date = new Date(isoTime);
      let hours = date.getHours();
      const minutes = date.getMinutes();
      const ampm = hours >= 12 ? 'PM' : 'AM';

      hours = hours % 12;
      hours = hours ? hours : 12; // 0 becomes 12
      const paddedMinutes = minutes < 10 ? '0' + minutes : minutes;

      return `${hours}:${paddedMinutes} ${ampm}`;
   }

   // show the file name and file priview
   $('#chatFile').on('change', function () {
        const file = this.files[0];
        if (file) {
            $('#message').val(file.name);
        } else {
            $('#message').val('');
        }
    });

   // JavaScript Polling (e.g., every 10 seconds) 
   // Only fetch new messages (track last timestamp or message ID)
   const quotationId = "{{ $quote->id }}";
   const authId = {{ $authId }};
   let lastMessageTimestamp = null;

   setInterval(() => {
      $.get(`/user-quote-json/${quotationId}`, function (response) {
         response.messages.forEach(msg => {
               if (!lastMessageTimestamp || new Date(msg.timestamp) > new Date(lastMessageTimestamp)) {
                  appendMessage(msg, response.authId);
                  lastMessageTimestamp = msg.timestamp;
               }
         });
      });
   }, 10000);

   // function fetchMessages() {
   //    $.ajax({
   //       url: `/user-quote-json/${quotationId}`,
   //       method: 'GET',
   //       success: function(response) {
   //             let newMessages = response.messages.filter(msg =>
   //                !lastMessageTimestamp || new Date(msg.timestamp) > new Date(lastMessageTimestamp)
   //             );

   //             newMessages.forEach(msg => {
   //                appendMessage(msg, response.authId);
   //                lastMessageTimestamp = msg.timestamp;
   //             });

   //             // 🌀 Immediately fetch next messages (not after 5s)
   //             fetchMessages();
   //       },
   //       error: function() {
   //             // 🔁 Try again after a short delay if error occurs
   //             setTimeout(fetchMessages, 3000);
   //       }
   //    });
   // }

   // // Start the long polling
   // fetchMessages();
</script>

@endsection
