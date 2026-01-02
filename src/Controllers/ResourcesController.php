<?php

namespace Controllers;

class ResourcesController {
    
    private function getResources() {
        return [
            'project-management' => [
                'title' => 'Executive Function Friendly Project Management',
                'category' => 'work',
                'tags' => ['Productivity', 'ADHD'],
                'desc' => 'A guide to breaking down massive projects into dopamine-friendly micro-tasks.',
                'content' => '
                    <h2>The "Chunking" Method</h2>
                    <p>When a project feels overwhelming, it’s often because our brains see it as one giant, insurmountable mountain. The key is to break it down until the tasks feel almost "too easy."</p>
                    
                    <h3>Step 1: The Brain Dump</h3>
                    <p>Get everything out of your head. Don\'t worry about order or priority. Just write down every single step you can think of associated with the project.</p>
                    
                    <h3>Step 2: Micro-Tasking</h3>
                    <p>Take one item from your list, like "Write Report." That is still too big. Break it down:</p>
                    <ul>
                        <li>Open Word document</li>
                        <li>Save file with correct name</li>
                        <li>Write title</li>
                        <li>Copy paste data from Excel</li>
                        <li>Write introduction paragraph</li>
                    </ul>
                    <p>Tick off each micro-task. The dopamine hit from checking off a box helps propel you to the next one.</p>

                    <h3>Step 3: The "Swiss Cheese" Method</h3>
                    <p>If you can\'t start at the beginning, start in the middle. Poke holes in the project like Swiss cheese. Do the easy parts first to build momentum.</p>
                '
            ],
            'workplace-disclosure' => [
                'title' => 'Disclosure at Work: Scripts & Strategies',
                'category' => 'work',
                'tags' => ['Advocacy', 'Career'],
                'desc' => 'Deciding if, when, and how to disclose your neurodivergence to an employer.',
                'content' => '
                    <h2>To Disclose or Not to Disclose?</h2>
                    <p>This is a personal decision. You are not legally required to disclose your diagnosis unless you are requesting reasonable accommodations under the ADA (in the US) or similar laws.</p>
                    
                    <h3>When to Consider Disclosure</h3>
                    <ul>
                        <li>When your symptoms are actively impacting your performance.</li>
                        <li>When you need specific accommodations to do your job well.</li>
                        <li>If the company has a strong, proven culture of inclusivity.</li>
                    </ul>

                    <h3>Script: Requesting a Meeting</h3>
                    <p><em>"Hi [Manager Name], I\'d like to schedule a brief meeting to discuss some ways I can optimize my workflow and productivity. I have some ideas that I think will help me contribute even more effectively to the team."</em></p>

                    <h3>Script: The Disclosure</h3>
                    <p><em>"I want to share that I am [Autistic/ADHD/Neurodivergent]. This means that my brain processes information differently. While this brings strengths like [mention strength, e.g., hyperfocus, pattern recognition], it also means I work best with [accommodation, e.g., written instructions, quiet workspace]. I believe implementing [X] would allow me to perform at my best."</em></p>
                '
            ],
            'body-doubling' => [
                'title' => 'The "Body Doubling" Technique',
                'category' => 'work',
                'tags' => ['Focus', 'Technique'],
                'desc' => 'How working alongside someone else can magically fix procrastination.',
                'content' => '
                    <h2>What is Body Doubling?</h2>
                    <p>Body doubling is a productivity strategy where another person works alongside you as you complete a task. The body double doesn\'t need to help with the task; they just need to be present.</p>
                    
                    <h3>Why It Works</h3>
                    <p>For many neurodivergent brains, the mere presence of another person acts as an "anchor" for attention. It provides a subtle social pressure that keeps you in "work mode" and reduces the likelihood of getting distracted.</p>
                    
                    <h3>How to Do It</h3>
                    <ul>
                        <li><strong>In Person:</strong> Ask a friend or colleague to sit with you while you both work on separate tasks.</li>
                        <li><strong>Virtual:</strong> Use video calls (Zoom/Discord) where you both keep cameras on but stay muted.</li>
                        <li><strong>Apps:</strong> Platforms like Focusmate connect you with on-demand body doubles for 25-50 minute sessions.</li>
                    </ul>
                '
            ],
            'sensory-office' => [
                'title' => 'Sensory-Friendly Office Setup',
                'category' => 'work',
                'tags' => ['Environment', 'Sensory'],
                'desc' => 'Recommendations to minimize workplace fatigue.',
                'content' => '
                    <h2>Lighting</h2>
                    <p>Fluorescent lights can be physically painful and draining. Try:</p>
                    <ul>
                        <li>Asking for a desk near a window for natural light.</li>
                        <li>Using a monitor hood to reduce glare.</li>
                        <li>Wearing blue-light blocking glasses or rose-tinted lenses (like FL-41s).</li>
                    </ul>

                    <h2>Sound</h2>
                    <p>Open plan offices are often a nightmare. Protect your focus with:</p>
                    <ul>
                        <li>Active Noise Cancelling (ANC) headphones.</li>
                        <li>Loop Earplugs (Experience or Engage models) to filter background noise while allowing conversation.</li>
                        <li>White noise or "Brown noise" playlists (Brown noise is deeper and often more soothing for ADHD brains).</li>
                    </ul>

                    <h2>Seating</h2>
                    <p>If you need to fidget to focus:</p>
                    <ul>
                        <li>Sit on a stability ball or use a wobble cushion.</li>
                        <li>Use a footrest that allows movement.</li>
                        <li>Keep discreet fidget toys (spinner rings, textured stones) at your desk.</li>
                    </ul>
                '
            ],
            'autistic-burnout' => [
                'title' => 'The Autistic Burnout Recovery Guide',
                'category' => 'health',
                'tags' => ['Burnout', 'Recovery'],
                'desc' => 'Recognizing signs of burnout and a plan for radical rest.',
                'content' => '
                    <h2>What is Autistic Burnout?</h2>
                    <p>It is a state of physical, mental, and emotional exhaustion caused by the cumulative effect of masking and navigating a neurotypical world. It differs from occupational burnout and can lead to a loss of skills (skill regression).</p>
                    
                    <h3>The Signs</h3>
                    <ul>
                        <li>Increased sensory sensitivity.</li>
                        <li>Loss of ability to speak (selective mutism) or socialize.</li>
                        <li>Extreme fatigue that sleep doesn\'t fix.</li>
                        <li>Difficulty with executive function tasks you could previously handle.</li>
                    </ul>

                    <h3>The Recovery Plan: Radical Rest</h3>
                    <p><strong>1. Drop the Demands:</strong> Minimize expectations. If you can order food instead of cooking, do it. If you can say no to social events, do it.</p>
                    <p><strong>2. Engage in Special Interests:</strong> Deep diving into your passions is restorative for the autistic brain. It recharges your energy.</p>
                    <p><strong>3. Sensory Detox:</strong> Spend time in low-sensory environments (dark room, silence, weighted blanket).</p>
                    <p><strong>4. Unmask:</strong> Find safe spaces where you don\'t have to perform neurotypicality.</p>
                '
            ],
            'dopamine-menu' => [
                'title' => 'Dopamine Menu for Low Energy Days',
                'category' => 'health',
                'tags' => ['Self-Care', 'ADHD'],
                'desc' => 'Create a menu of activities that provide stimulation without draining energy.',
                'content' => '
                    <h2>What is a Dopamine Menu?</h2>
                    <p>ADHD brains crave stimulation (dopamine). When we are bored or low-energy, we often doom-scroll, which provides "cheap" dopamine but leaves us feeling worse. A Dopamine Menu is a pre-written list of activities to turn to instead.</p>
                    
                    <h3>Appetizers (Quick Hits - 5-10 mins)</h3>
                    <ul>
                        <li>Pet the dog/cat.</li>
                        <li>Listen to one favorite song and dance.</li>
                        <li>Eat a crunchy snack.</li>
                        <li>Do 10 jumping jacks.</li>
                    </ul>

                    <h3>Main Courses (Deep Engagement)</h3>
                    <ul>
                        <li>Play a video game.</li>
                        <li>Work on a hobby/craft.</li>
                        <li>Go for a walk in nature.</li>
                        <li>Call a friend.</li>
                    </ul>

                    <h3>Sides (Add-ons to boring tasks)</h3>
                    <ul>
                        <li>Listen to a podcast while folding laundry.</li>
                        <li>Use a fidget toy during meetings.</li>
                        <li>Drink a fancy beverage while working.</li>
                    </ul>
                '
            ],
            'sleep-hygiene' => [
                'title' => 'Sleep Hygiene for Busy Brains',
                'category' => 'health',
                'tags' => ['Sleep', 'Health'],
                'desc' => 'Strategies to wind down when your internal monologue won\'t stop.',
                'content' => '
                    <h2>The "Revenge Bedtime Procrastination" Loop</h2>
                    <p>Neurodivergent people often stay up late because it\'s the only time they feel they have true autonomy and quiet. Acknowledge this need, but try to find it earlier in the day if possible.</p>
                    
                    <h3>Strategies</h3>
                    <ul>
                        <li><strong>Brain Dump Journaling:</strong> Keep a notebook by the bed. If a thought loops, write it down to "outsource" the memory.</li>
                        <li><strong>Sensory Regulation:</strong>
                            <ul>
                                <li>Weighted blankets (10-15% of body weight) increase serotonin and melatonin.</li>
                                <li>Cool room temperature (65°F / 18°C).</li>
                                <li>Blackout curtains.</li>
                            </ul>
                        </li>
                        <li><strong>Audio Anchors:</strong> "Sleep stories" (like Calm or Headspace) or familiar audiobooks give your brain something to focus on that isn\'t your own thoughts, but isn\'t stimulating enough to keep you awake.</li>
                    </ul>
                '
            ],
            'stimming-101' => [
                'title' => 'Stimming 101: Why It Helps',
                'category' => 'health',
                'tags' => ['Education', 'Sensory'],
                'desc' => 'Understanding self-stimulatory behavior as a valid regulation tool.',
                'content' => '
                    <h2>What is Stimming?</h2>
                    <p>Stimming (Self-Stimulatory Behavior) is repetitive movement or noise. Everyone stims (tapping a pen, twirling hair), but neurodivergent people often stim more visibly and for different reasons.</p>
                    
                    <h3>Functions of Stimming</h3>
                    <ul>
                        <li><strong>Regulation:</strong> Calming down the nervous system during stress.</li>
                        <li><strong>Focus:</strong> Adding sensory input to help the brain concentrate (like doodling while listening).</li>
                        <li><strong>Expression:</strong> "Happy flapping" to express joy.</li>
                    </ul>

                    <h3>Breaking the Stigma</h3>
                    <p>Society often tells us to "quiet hands." Ignore that. Unless your stim is self-injurious, it is a healthy and necessary tool. If you need to stim discreetly in public, try textured jewelry, subtle swaying, or silent fidget toys.</p>
                '
            ],
            'double-empathy' => [
                'title' => 'The Double Empathy Problem',
                'category' => 'social',
                'tags' => ['Communication', 'Research'],
                'desc' => 'Why communication breakdowns happen between ND and NT people.',
                'content' => '
                    <h2>It\'s Not a Deficit, It\'s a Mismatch</h2>
                    <p>Traditional psychology framed autistic communication as "deficient." Dr. Damian Milton\'s "Double Empathy Problem" theory suggests that communication breakdowns occur because autistic and non-autistic people have <em>different</em> experiences of the world, making it hard to empathize with each other.</p>
                    
                    <h3>Key Takeaways</h3>
                    <ul>
                        <li>Autistic people communicate quite well with other autistic people.</li>
                        <li>Non-autistic people struggle to read autistic cues just as much as autistic people struggle to read non-autistic cues.</li>
                        <li>It is a two-way street. The burden of adaptation should not fall solely on the neurodivergent person.</li>
                    </ul>
                    
                    <p>Knowing this can reduce feelings of shame. You aren\'t "bad" at communicating; you just have a different communication style.</p>
                '
            ],
            'boundaries' => [
                'title' => 'Setting Boundaries Without Guilt',
                'category' => 'social',
                'tags' => ['Boundaries', 'Emotional Health'],
                'desc' => 'Scripts for declining social events when you need to recharge.',
                'content' => '
                    <h2>The "Spoons" Reality</h2>
                    <p>You have limited energy. Protecting it is not selfish; it is necessary for your survival. Setting boundaries is how you protect your "spoons."</p>
                    
                    <h3>Scripts for "No"</h3>
                    <ul>
                        <li><strong>The Soft No:</strong> "Thank you for the invite! I\'ve had a really long week and need to recharge this weekend, so I won\'t be able to make it."</li>
                        <li><strong>The "Not Now":</strong> "I can\'t do dinner tonight, but I\'d love to catch up over a phone call next week when I have more bandwidth."</li>
                        <li><strong>The Work Boundary:</strong> "I want to give this project my full attention. To do that, I need to block off 9am-11am for deep work and won\'t be checking emails then."</li>
                    </ul>
                '
            ],
            'rsd-guide' => [
                'title' => 'Navigating "Rejection Sensitive Dysphoria" (RSD)',
                'category' => 'social',
                'tags' => ['RSD', 'Emotional Regulation'],
                'desc' => 'Tools to manage the intense emotional pain of perceived rejection.',
                'content' => '
                    <h2>What is RSD?</h2>
                    <p>Rejection Sensitive Dysphoria is an extreme emotional sensitivity and pain triggered by the perception (not necessarily the reality) of being rejected, teased, or criticized. It is very common in ADHD.</p>
                    
                    <h3>Management Strategies</h3>
                    <ul>
                        <li><strong>Fact Check:</strong> Ask yourself, "Did they actually say they are mad, or is my brain filling in the gaps?"</li>
                        <li><strong>The "Oops" Rule:</strong> Allow yourself to make mistakes. Remind yourself that one mistake does not equal total failure or loss of love.</li>
                        <li><strong>Communicate:</strong> If you trust the person, ask for reassurance. "My brain is telling me you\'re upset with me. Are we okay?"</li>
                    </ul>
                '
            ],
            'focus-apps' => [
                'title' => 'Top 5 Focus Apps for 2026',
                'category' => 'tools',
                'tags' => ['Apps', 'Technology'],
                'desc' => 'A curated review of apps that actually help.',
                'content' => '
                    <h2>1. Forest</h2>
                    <p><strong>Best for:</strong> Gamifying focus.</p>
                    <p>Plant a virtual tree. If you leave the app to check Instagram, your tree dies. Simple, cute, and effective.</p>

                    <h2>2. Tiimo</h2>
                    <p><strong>Best for:</strong> Visual scheduling.</p>
                    <p>Designed for neurodiversity. Uses icons and colors to visualize your day and routine.</p>

                    <h2>3. Goblin Tools</h2>
                    <p><strong>Best for:</strong> Executive dysfunction.</p>
                    <p>Use the "Magic ToDo" to type in a task like "Clean Room," and the AI breaks it down into tiny steps automatically.</p>

                    <h2>4. StayFree</h2>
                    <p><strong>Best for:</strong> Blocking distractions.</p>
                    <p>Tracks usage and blocks apps after a set limit. Hard blocks are sometimes necessary.</p>

                    <h2>5. Brain.fm</h2>
                    <p><strong>Best for:</strong> Auditory focus.</p>
                    <p>Science-backed functional music designed to steer your brain into a flow state.</p>
                '
            ],
            'visual-timers' => [
                'title' => 'Visual Timers & Time Blindness',
                'category' => 'tools',
                'tags' => ['Time Management', 'Tools'],
                'desc' => 'Why seeing time pass is more effective than reading a clock.',
                'content' => '
                    <h2>What is Time Blindness?</h2>
                    <p>It is the inability to sense the passing of time or estimate how long a task will take. "Now" and "Not Now" are the only two time zones.</p>
                    
                    <h3>Why Visual Timers Help</h3>
                    <p>Analog clocks or digital numbers are abstract. A visual timer (like the Time Timer) shows a red disk disappearing. You can <em>see</em> how much time is left, which makes it concrete and helps the brain prepare for transitions.</p>
                    
                    <h3>Recommendations</h3>
                    <ul>
                        <li><strong>Time Timer:</strong> The classic standard.</li>
                        <li><strong>Sand Timers:</strong> Great for short bursts (5, 10, 15 mins).</li>
                        <li><strong>Hexagon Timer:</strong> Flip it to start a preset countdown. Great for "Pomodoro" sessions.</li>
                    </ul>
                '
            ],
            'noise-cancelling' => [
                'title' => 'Noise Cancelling Headphones Review',
                'category' => 'tools',
                'tags' => ['Sensory', 'Gear'],
                'desc' => 'The best over-ear and in-ear options for blocking out the world.',
                'content' => '
                    <h2>Over-Ear (Maximum Silence)</h2>
                    <p><strong>Sony WH-1000XM5:</strong> The gold standard. Incredible noise cancellation, comfortable for long wear, and "Speak-to-Chat" features.</p>
                    <p><strong>Bose QuietComfort Ultra:</strong> Extremely comfortable, which is crucial if you have sensory issues with pressure on your head.</p>

                    <h2>In-Ear (Discrete)</h2>
                    <p><strong>AirPods Pro 2:</strong> excellent transparency mode (hear the world naturally) and noise cancellation.</p>
                    <p><strong>Loop Earplugs (Switch):</strong> Not electronic, but adjustable passive filtering. Great for concerts or loud bars.</p>
                '
            ],
            'ada-rights' => [
                'title' => 'Know Your Rights: ADA & Workplace',
                'category' => 'legal',
                'tags' => ['Rights', 'USA'],
                'desc' => 'A plain-English breakdown of your legal protections.',
                'content' => '
                    <h2>The Americans with Disabilities Act (ADA)</h2>
                    <p>If you have a diagnosis that "substantially limits one or more major life activities" (which often includes ADHD and Autism), you are protected.</p>
                    
                    <h3>Reasonable Accommodations</h3>
                    <p>Employers must provide "reasonable accommodations" unless it causes "undue hardship." Examples include:</p>
                    <ul>
                        <li>Flexible schedule (start/end times).</li>
                        <li>Remote work options.</li>
                        <li>Written instructions instead of verbal.</li>
                        <li>Noise-cancelling headphones allowance.</li>
                    </ul>

                    <h3>The Process</h3>
                    <p>You do not need to use the words "ADA" to make a request, but it helps to be formal. Put requests in writing. Focus on how the accommodation helps you do your job.</p>
                '
            ],
            'advocacy-cards' => [
                'title' => 'Self-Advocacy Card Template',
                'category' => 'legal',
                'tags' => ['Tools', 'Communication'],
                'desc' => 'Downloadable cards to discreetly explain your needs.',
                'content' => '
                    <h2>What is an Advocacy Card?</h2>
                    <p>A small business-sized card you can hand to someone during a shutdown, meltdown, or emergency when you cannot speak.</p>
                    
                    <h3>Template Text</h3>
                    <div style="border: 2px dashed #ccc; padding: 15px; margin: 10px 0; background: #fff;">
                        <p><strong>I am Autistic / Neurodivergent.</strong></p>
                        <p>Please be patient. I may have difficulty speaking or understanding you right now.</p>
                        <p><strong>How you can help:</strong></p>
                        <ul>
                            <li>Speak clearly and slowly.</li>
                            <li>Do not touch me without permission.</li>
                            <li>Allow me time to process.</li>
                            <li>If this is an emergency, please call: [Emergency Contact]</li>
                        </ul>
                    </div>
                    <p>Print this, fill it out, laminate it, and keep it in your wallet.</p>
                '
            ]
        ];
    }

    public function index() {
        $resources = $this->getResources();
        // Add ID to each resource for the view link
        foreach ($resources as $id => &$res) {
            $res['id'] = $id;
            $res['link'] = BASE_URL . '/resources/view?id=' . $id;
        }
        require VIEW_PATH . '/resources.php';
    }

    public function view() {
        $id = $_GET['id'] ?? '';
        $resources = $this->getResources();

        if (array_key_exists($id, $resources)) {
            $resource = $resources[$id];
            require VIEW_PATH . '/resource_detail.php';
        } else {
            // Resource not found
            http_response_code(404);
            require VIEW_PATH . '/404.php';
        }
    }
}
