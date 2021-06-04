<?php

/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<div class="content">

	<div class="inner-content">

		<main class="main" role="main">

			<section class="banner">

				<div class="bg" style="background-image: url(<?php the_field('ph_background_image'); ?>)"></div>

				<div class="inner grid-container fluid">

					<div class="heading-wrap">
						<?php if ($small_heading = get_field('ph_small_heading')) : ?>
							<h1><?php echo $small_heading; ?></h1>
						<?php endif; ?>

						<?php if ($large_heading = get_field('ph_large_heading')) : ?>
							<h2><?php echo $large_heading; ?></h2>
						<?php endif; ?>
					</div>

				</div>

				<nav class="drawer-nav-mobile hide-for-tablet">

					<div class="accordion" data-accordion>

						<?php if (have_rows('ph_tab_1')) : ?>
							<div class="accordion-item" data-accordion-item>
								<?php while (have_rows('ph_tab_1')) : the_row(); ?>

									<a href="#" class="accordion-title small-caps text-center"><?php the_sub_field('tab_label'); ?></a>

									<div class="accordion-content" data-tab-content>
										<div class="grid-container">
											<div class="grid-x grid-padding-x">
												<div class="cell small-12">
													<h3><?php the_sub_field('link_heading'); ?></h3>

													<div class="links-wrap">

														<?php
														$link = get_sub_field('link_1');
														if ($link) :
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<div>
																<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
															</div>
														<?php endif; ?>

														<?php
														$link = get_sub_field('link_2');
														if ($link) :
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<div>
																<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
															</div>
														<?php endif; ?>

													</div>

												</div>
											</div>
										</div>
									</div>

								<?php endwhile; ?>
							</div>
						<?php endif; ?>

						<?php if (have_rows('ph_tab_2')) : ?>
							<div class="accordion-item" data-accordion-item>
								<?php while (have_rows('ph_tab_2')) : the_row(); ?>

									<a href="#" class="accordion-title small-caps text-center"><?php the_sub_field('tab_label'); ?></a>

									<div class="accordion-content" data-tab-content>
										<div class="grid-container">
											<div class="grid-x grid-padding-x">
												<div class="cell small-12">
													<h3><?php the_sub_field('link_heading'); ?></h3>

													<div class="links-wrap">

														<?php
														$link = get_sub_field('link_1');
														if ($link) :
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<div>
																<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
															</div>
														<?php endif; ?>

														<?php
														$link = get_sub_field('link_2');
														if ($link) :
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<div>
																<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
															</div>
														<?php endif; ?>

													</div>

												</div>
											</div>
										</div>
									</div>

								<?php endwhile; ?>
							</div>
						<?php endif; ?>

						<?php if (have_rows('ph_tab_3')) : ?>
							<div class="accordion-item" data-accordion-item>
								<?php while (have_rows('ph_tab_3')) : the_row(); ?>

									<a href="#" class="accordion-title small-caps text-center"><?php the_sub_field('tab_label'); ?></a>

									<div class="accordion-content" data-tab-content>
										<div class="grid-container">
											<div class="grid-x grid-padding-x">
												<div class="cell small-12">
													<h3><?php the_sub_field('link_heading'); ?></h3>

													<div class="links-wrap">

														<?php
														$link = get_sub_field('link_1');
														if ($link) :
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<div>
																<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
															</div>
														<?php endif; ?>

														<?php
														$link = get_sub_field('link_2');
														if ($link) :
															$link_url = $link['url'];
															$link_title = $link['title'];
															$link_target = $link['target'] ? $link['target'] : '_self';
														?>
															<div>
																<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
															</div>
														<?php endif; ?>

													</div>

												</div>
											</div>
										</div>
									</div>

								<?php endwhile; ?>
							</div>
						<?php endif; ?>

					</div>

				</nav>


				<div class="mask"></div>

				<nav id="bh-drawer-nav" class="bh-drawer-nav">

					<?php if (have_rows('ph_tab_1')) : ?>
						<div class="drawer">
							<div class="lines-wrap"><span></span><span></span></div>
							<?php while (have_rows('ph_tab_1')) : the_row(); ?>
								<div class="tab small-caps"><?php the_sub_field('tab_label'); ?></div>

								<div class="content">
									<div class="inner">

										<h3><?php the_sub_field('link_heading'); ?></h3>

										<div class="links-wrap">

											<?php
											$link = get_sub_field('link_1');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<div>
												<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
											</div>
											<?php endif; ?>

											<?php
											$link = get_sub_field('link_2');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<div>
												<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
											</div>
											<?php endif; ?>

										</div>

									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php if (have_rows('ph_tab_2')) : ?>
						<div class="drawer">
							<div class="lines-wrap"><span></span><span></span></div>
							<?php while (have_rows('ph_tab_2')) : the_row(); ?>
								<div class="tab small-caps"><?php the_sub_field('tab_label'); ?></div>

								<div class="content">
									<div class="inner">

										<h3><?php the_sub_field('link_heading'); ?></h3>

										<div class="links-wrap">

											<?php
											$link = get_sub_field('link_1');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<div>
												<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
											</div>
											<?php endif; ?>

											<?php
											$link = get_sub_field('link_2');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<div>
												<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
											</div>
											<?php endif; ?>

										</div>

									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php if (have_rows('ph_tab_3')) : ?>
						<div class="drawer">
							<div class="lines-wrap"><span></span><span></span></div>
							<?php while (have_rows('ph_tab_3')) : the_row(); ?>
								<div class="tab small-caps"><?php the_sub_field('tab_label'); ?></div>

								<div class="content">
									<div class="inner">

										<h3><?php the_sub_field('link_heading'); ?></h3>

										<div class="links-wrap">

											<?php
											$link = get_sub_field('link_1');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<div>
												<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
											</div>
											<?php endif; ?>

											<?php
											$link = get_sub_field('link_2');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<div>
												<a class="arrow-link small-caps" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span class="small-caps underline"><?php echo esc_html($link_title); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow" /></a>
											</div>
											<?php endif; ?>

										</div>

									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

				</nav>

			</section><!-- banner -->

			<section class="improvement">

				<div class="inner lined">

					<div class="grid-container fluid offset-content left-line">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12">
								<div class="inner-padding">

									<div class="grid-x grid-padding-x">

										<div class="toggle-wrap cell small-12">

											<h2><?php the_field('imp_heading'); ?></h2>

											<div class="toggle-nav-wrap hide-for-medium">

												<?php if (have_rows('imp_slide_1')) : ?>
													<button class="toggle-nav-1 active third no-style" data-slide="1" aria-label="Show Slide One">
														<?php while (have_rows('imp_slide_1')) : the_row(); ?>
															<?php the_sub_field('button_label'); ?>

														<?php endwhile; ?>
													</button>
												<?php endif; ?>

												<span class="first"></span>

												<!-- 														<div class="third and-third">and</div> -->

												<?php if (have_rows('imp_slide_2')) : ?>
													<button class="toggle-nav-2 third no-style" data-slide="2" aria-label="Show Slide Two">
														<?php while (have_rows('imp_slide_2')) : the_row(); ?>
															<?php the_sub_field('button_label'); ?>

														<?php endwhile; ?>
													</button>
												<?php endif; ?>
												<span class="second"></span>

												<?php if (have_rows('imp_slide_3')) : ?>
													<button class="toggle-nav-3 third no-style" data-slide="3" aria-label="Show Slide Three">
														<?php while (have_rows('imp_slide_3')) : the_row(); ?>
															<?php the_sub_field('button_label'); ?>

														<?php endwhile; ?>
													</button>
												<?php endif; ?>

											</div>

											<div class="toggle-content-wrap">

												<div class="line-wrap">
													<div class="circ"></div>
													<div class="circ two"></div>
													<div class="line"></div>
												</div>

												<div class="grid-x grid-padding-x">

													<div class="right toggle-content-slider cell small-12 medium-9 medium-offset-3">

														<div id="toggle-1" class="toggle-content">

															<?php if (have_rows('imp_slide_1')) : ?>
																<?php while (have_rows('imp_slide_1')) : the_row(); ?>

																	<div class="icon-wrap">

																		<?php
																		$image = get_sub_field('icon');
																		if (!empty($image)) : ?>
																			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
																		<?php endif; ?>

																	</div>

																	<div class="text-wrap">
																		<h3><?php the_sub_field('heading'); ?></h3>
																		<?php the_sub_field('copy'); ?>
																	</div>

																<?php endwhile; ?>
															<?php endif; ?>

														</div>

														<div id="toggle-2" class="toggle-content">

															<?php if (have_rows('imp_slide_2')) : ?>
																<?php while (have_rows('imp_slide_2')) : the_row(); ?>

																	<div class="icon-wrap">

																		<?php
																		$image = get_sub_field('icon');
																		if (!empty($image)) : ?>
																			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
																		<?php endif; ?>

																	</div>

																	<div class="text-wrap">
																		<h3><?php the_sub_field('heading'); ?></h3>
																		<?php the_sub_field('copy'); ?>
																	</div>

																<?php endwhile; ?>
															<?php endif; ?>

														</div>

														<div id="toggle-3" class="toggle-content">

															<?php if (have_rows('imp_slide_3')) : ?>
																<?php while (have_rows('imp_slide_3')) : the_row(); ?>

																	<div class="icon-wrap">

																		<?php
																		$image = get_sub_field('icon');
																		if (!empty($image)) : ?>
																			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
																		<?php endif; ?>

																	</div>

																	<div class="text-wrap">
																		<h3><?php the_sub_field('heading'); ?></h3>
																		<?php the_sub_field('copy'); ?>
																	</div>

																<?php endwhile; ?>
															<?php endif; ?>

														</div>


													</div>

												</div>

											</div>

											<div class="toggle-nav-wrap show-for-medium">

												<?php if (have_rows('imp_slide_1')) : ?>
													<button class="toggle-nav-1 line-offset-const active third no-style" data-slide="1">
														<?php while (have_rows('imp_slide_1')) : the_row(); ?>
															<?php the_sub_field('button_label'); ?>

														<?php endwhile; ?>
													</button>
												<?php endif; ?>

												<span class="first"></span>

												<!-- 													<div class="third and-third">and</div> -->

												<?php if (have_rows('imp_slide_2')) : ?>
													<button class="toggle-nav-2 third no-style" data-slide="2">
														<?php while (have_rows('imp_slide_2')) : the_row(); ?>
															<?php the_sub_field('button_label'); ?>

														<?php endwhile; ?>
													</button>
												<?php endif; ?>

												<span class="second"></span>

												<?php if (have_rows('imp_slide_3')) : ?>
													<button class="toggle-nav-3 third no-style" data-slide="3">
														<?php while (have_rows('imp_slide_3')) : the_row(); ?>
															<?php the_sub_field('button_label'); ?>

														<?php endwhile; ?>
													</button>
												<?php endif; ?>

											</div>

										</div>

										<div class="bg-wrap opacity-img toggle-content-slider show-for-medium">

											<?php if (have_rows('imp_slide_1')) : ?>
												<?php while (have_rows('imp_slide_1')) : the_row(); ?>
													<div class="bg bg-1 active" data-slide="1" style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
												<?php endwhile; ?>
											<?php endif; ?>

											<?php if (have_rows('imp_slide_2')) : ?>
												<?php while (have_rows('imp_slide_2')) : the_row(); ?>
													<div class="bg bg-2" data-slide="2" style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
												<?php endwhile; ?>
											<?php endif; ?>

											<?php if (have_rows('imp_slide_3')) : ?>
												<?php while (have_rows('imp_slide_3')) : the_row(); ?>
													<div class="bg bg-3" data-slide="3" style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
												<?php endwhile; ?>
											<?php endif; ?>

										</div>

									</div>

								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="bottom-line"></div>

			</section>


			<section class="home-tabs hide-for-medium">

				<?php if (have_rows('accordion_sections')) : ?>
					<ul class="tabs" data-tabs id="home-tabs">
						<?php while (have_rows('accordion_sections')) : the_row(); ?>

							<?php $tabNumber = get_row_index(); ?>

							<?php if (have_rows('single_section')) : ?>
								<?php while (have_rows('single_section')) : the_row(); ?>
									<li class="tabs-title<?php if ($tabNumber == 1) : ?> is-active<?php endif; ?>">
										<a href="#panel-<?php echo $tabNumber; ?>" <?php if ($tabNumber == 1) : ?>aria-selected="true" <?php endif; ?>>
											<span>No. 0<?php echo $tabNumber; ?></span>
										</a>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>

						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<?php if (have_rows('accordion_sections')) : ?>
					<div class="tabs-content" data-tabs-content="home-tabs">
						<?php while (have_rows('accordion_sections')) : the_row(); ?>
							<?php $panelNumber = get_row_index(); ?>

							<?php if (have_rows('single_section')) : ?>
								<?php while (have_rows('single_section')) : the_row(); ?>

									<div class="tabs-panel<?php if ($panelNumber == 1) : ?> is-active<?php endif; ?>" id="panel-<?php echo $panelNumber; ?>">
										<div class="inner">

											<h2><?php the_sub_field('heading'); ?></h2>

											<p><?php the_sub_field('text'); ?></p>

											<?php
											$link = get_sub_field('link_button');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="button lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
											<?php endif; ?>

										</div>
									</div>

								<?php endwhile; ?>
							<?php endif; ?>

						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</section>

			<?php $count = 0;
			$acc_rows = get_field('accordion_sections');
			if (is_array($acc_rows)) {
				$count = count($acc_rows);
			}; ?>

			<section class="home-accordion rows-<?php echo $count; ?> show-for-medium">
				<div class="bg-wrap grid-container fluid offset-content left-line">
					<div class="grid-x grid-padding-x">

						<div class="inner">

							<?php if (have_rows('accordion_sections')) : ?>
								<div class="accordion">
									<?php while (have_rows('accordion_sections')) : the_row(); ?>

										<?php $num = get_row_index(); ?>

										<?php if (have_rows('single_section')) : ?>
											<?php while (have_rows('single_section')) : the_row(); ?>

												<div class="accordion-item">
													<a href="#" class="accordion-title">
														<span>No. 0<?php echo $num; ?></span>
													</a>

													<div class="accordion-inner-content">

														<div class="inner">

															<h2><?php the_sub_field('heading'); ?></h2>

															<p><?php the_sub_field('text'); ?></p>

															<?php
															$link = get_sub_field('link_button');
															if ($link) :
																$link_url = $link['url'];
																$link_title = $link['title'];
																$link_target = $link['target'] ? $link['target'] : '_self';
															?>
																<a class="button lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
															<?php endif; ?>

														</div>

													</div>

												</div>
											<?php endwhile; ?>
										<?php endif; ?>

									<?php endwhile; ?>
								</div>
							<?php endif; ?>

						</div>


					</div>
				</div>

				<div class="bottom-line"></div>

			</section>

			<section class="alternating-rows">
				<div class="grid-container fluid offset-content">

					<?php if (have_rows('alt_row_1')) : ?>
						<?php while (have_rows('alt_row_1')) : the_row(); ?>

							<div class="single-row grid-x grid-padding-x">

								<div class="left cell small-12">

									<div class="inner">

										<h2><?php the_sub_field('heading'); ?></h2>
										<?php
										$link = get_sub_field('button_link');
										if ($link) :
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="button lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
										<?php endif; ?>

									</div>

								</div>

								<div class="right cell small-12 medium-7">

									<div class="img-wrap opacity-img">

										<?php
										$image = get_sub_field('image');
										if (!empty($image)) : ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>

									</div>

								</div>

							</div>

						<?php endwhile; ?>
					<?php endif; ?>

					<?php if (have_rows('alt_row_2')) : ?>
						<?php while (have_rows('alt_row_2')) : the_row(); ?>

							<div class="single-row grid-x grid-padding-x">

								<div class="left cell small-12">

									<div class="inner">

										<h2><?php the_sub_field('heading'); ?></h2>
										<?php
										$link = get_sub_field('button_link');
										if ($link) :
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="button lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
										<?php endif; ?>

									</div>

								</div>

								<div class="right cell small-12 medium-7">

									<div class="img-wrap opacity-img">

										<?php
										$image = get_sub_field('image');
										if (!empty($image)) : ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>

									</div>

								</div>

							</div>

						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</section>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>